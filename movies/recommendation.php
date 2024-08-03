<?php
$conn = mysqli_connect("localhost", "root", "", "bvb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function recommendCrops($conn, $preferences) {    
    $sql = "SELECT * FROM recommendation";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    
    $allCrops = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $allCrops[] = $row;
    }

    $recommendations = [];
    foreach ($allCrops as $crop) {
        
        $similarityCount = 0;
        foreach ($preferences as $key => $value) {
            
            similar_text(strtolower($value), strtolower($crop[$key]), $similarityPercentage);
            
            if ($similarityPercentage >= 80) {
                $similarityCount++;
            }
        }
       
        if ($similarityCount >= 2) {
            $recommendations[] = $crop['name'];
        }
    }

   
    return $recommendations;
}


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userPreferences = [
        'climate' => $_POST['climate'],
        'soil_type' => $_POST['soil'],
        'yield_potential' => $_POST['yield']
    ];

    // Get recommended crops based on user preferences
    $recommendedCrops = recommendCrops($conn, $userPreferences);

   
    if (empty($recommendedCrops)) {
        echo "No crops found matching your preferences.";
    } else {
        echo "Recommended crops based on your preferences:<br>";
        foreach ($recommendedCrops as $crop) {
            echo "- $crop<br>";
        }
    }
}


mysqli_close($conn);
?>