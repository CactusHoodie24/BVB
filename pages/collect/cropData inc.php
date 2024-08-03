<?php
session_start(); // Ensure sessions are started

if (!isset($_SESSION['unique_id'])) {
    echo "Session unique_id not set.";
    exit();
}

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "bvb");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$unique_id = mysqli_real_escape_string($conn, $_SESSION['unique_id']);

// Fetch researcher details using unique_id
$sql = "SELECT * FROM researcher WHERE unique_id = '{$unique_id}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if (!$row) {
    echo "Researcher not found";
    exit();
}

// Retrieve form data
$username = mysqli_real_escape_string($conn, $_POST['crop_name']);
$role = mysqli_real_escape_string($conn, $_POST['harvest_date']);
$yield = mysqli_real_escape_string($conn, $_POST['yield']);
$temperature = mysqli_real_escape_string($conn, $_POST['temperature']);
$rainfall = mysqli_real_escape_string($conn, $_POST['rainfall']);
$Fertlizer = mysqli_real_escape_string($conn, $_POST['fertilizer']);

// Insert data into database
$sql = "INSERT INTO yield (crop_name, temperature, rainfall, fertilizer, yield, dates) 
        VALUES ('$username', '$temperature', '$rainfall', '$Fertlizer', '$yield', '$role')";
if (mysqli_query($conn, $sql)) {
    echo "Uploaded successful";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
