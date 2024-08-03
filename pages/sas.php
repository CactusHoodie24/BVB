<?php

require_once 'vendor/autoload.php';

use Phpml\Regression\LeastSquares;


$mysqli = new mysqli("localhost", "root", "", "bvb");


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_rainfall = filter_input(INPUT_POST, "fertilizer", FILTER_VALIDATE_FLOAT);
    $selected_crop = filter_input(INPUT_POST, "crop_name", FILTER_SANITIZE_STRING);

  
    if (!is_numeric($new_rainfall)) {
        die("Invalid input: Rainfall must be a numeric value.");
    }

    
    $result = $mysqli->query("SELECT fertilizer, yield FROM yield WHERE crop_name='$selected_crop'");
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    
    $features = [];
    $labels = [];
    foreach ($data as $row) {
        $features[] = [$row['fertilizer']]; 
        $labels[] = $row['yield'];
    }

    
    $regression = new LeastSquares();
    $regression->train($features, $labels);

    
    $predicted_yield = $regression->predict([$new_rainfall]);
    echo "<script src='../Javascript/sweetalert.js'></script>";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
    swal({
        title: 'Predicted Yield',
                text: 'Predicted Yield for fertilizer $new_rainfall: $predicted_yield',
                icon: 'success',
                button: 'OK'
      });
    });
          </script>";

    
    $mysqli->close();
}
?>


<html>
<head>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="../css/style-home.css">
    <script src="https://kit.fontawesome.com/5a50a80444.js" crossorigin="anonymous"></script>
    <style>
.me {
    width: 50%;
    position: relative;
    left: 150px;
    padding-left: 229px;
    margin-top: 229px;

}
.me input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.me input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.me input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<header class="header">
            <a href="#" class="logo">Bvumbwe</a>
            <nav class="navbar">
                <a href="home.php" style="--i:1;" class="active">Home</a>
                <a href="#" style="--i:2;">About</a>
                <a href="#" style="--i:3;">Review</a>
                <a href="#"style="--i:4;">Get recommendations</a>
                <a href="#" style="--i:5;">Contact</a>
            </nav>
        </header>
<body>
<form class="me" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Crop:
    <select name="crop_name">
        <option value="Tomatoes">Tomatoes</option>
        <option value="Walnuts">Walnuts</option>
    </select>
    Fertilizer: <input type="text" name="fertilizer">
    <input type="submit">
</form>
</body>
</html>
