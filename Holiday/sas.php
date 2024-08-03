<?php
// Include PHP-ML library
require_once 'vendor/autoload.php';

use Phpml\Regression\LeastSquares;

// Connect to MySQL database
$mysqli = new mysqli("localhost", "root", "", "chat");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_rainfall = $_POST["rainfall"];

    // Validate user input (you may add additional validation as needed)
    if (!is_numeric($new_rainfall)) {
        die("Invalid input: Rainfall must be a numeric value.");
    }

// Retrieve data from database
$result = $mysqli->query("SELECT rainfall, yield FROM yield_data");
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Split data into features (rainfall) and labels (yield)
$features = [];
$labels = [];
foreach ($data as $row) {
    $features[] = [$row['rainfall']];
    $labels[] = $row['yield'];
}

// Train linear regression model
$regression = new LeastSquares();
$regression->train($features, $labels);

// Evaluate model
$predictions = $regression->predict($features);

// Calculate mean squared error
$mse = 0;
for ($i = 0; $i < count($labels); $i++) {
    $mse += pow($predictions[$i] - $labels[$i], 2);
}
$mse /= count($labels);

echo "Mean Squared Error: " . $mse . "\n";

// Predict yield based on new rainfall data
// Predict yield based on new rainfall data
$predicted_yield = $regression->predict([$new_rainfall]);
echo "Predicted Yield for rainfall $new_rainfall: " . $predicted_yield . "\n";


// Close database connection
$mysqli->close();
}
?>


<html>
    <head>
        <link rel="stylesheet" href="../css/style-home.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
        <script src="https://kit.fontawesome.com/5a50a80444.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Rainfall: <input type="text" name="rainfall">
  <input type="submit">
</form>
</body>
</html>
