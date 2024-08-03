<?php
session_start();

if (!isset($_SESSION['unique_id'])) {
    echo "Session unique_id not set.";
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bvb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_message_count = "SELECT COUNT(*) AS message_count FROM messages WHERE incoming_msg_id = {$_SESSION['unique_id']}";
$result = $conn->query($sql_message_count);
$message_count = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $message_count = $row['message_count'];
}

echo $message_count;

$conn->close();
?>
