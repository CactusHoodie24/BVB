<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header('location: ../Main-dash.php');
    exit(); // stop execution after redirection
}

include_once '../index.php';
$conn = mysqli_connect("localhost", "root", "", "bvb");

// Retrieve unique_id from session
$unique_id = $_SESSION['unique_id'];

// Fetch researcher details using unique_id
$sql = mysqli_query($conn, "SELECT * FROM researcher WHERE unique_id = '{$unique_id}'");
$row = mysqli_fetch_assoc($sql);
if (!$row) {
    echo "Researcher not found";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $heading = mysqli_real_escape_string($conn, $_POST['heading']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $article_date = mysqli_real_escape_string($conn, $_POST['article_date']);
   

    if (!empty($heading) && !empty($description) && !empty($article_date)) {

      


        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $img_name = $_FILES['img']['name'];
            $tmp_name = $_FILES['img']['tmp_name'];
            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);
            $extensions = ['png', 'jpeg', 'jpg'];

            if (in_array($img_ext, $extensions)) {
                $new_img_name = time() . $img_name;
                if (move_uploaded_file($tmp_name, "../../images/" . $new_img_name)) {
                    // Insert article into database
                    $query = "INSERT INTO article (heading, description, article_date, img, unique_id) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt, 'sssss', $heading, $description, $article_date, $new_img_name, $unique_id);
                    if (mysqli_stmt_execute($stmt)) {
                        echo "Success";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Failed to move uploaded file";
                }
            } else {
                echo "Invalid image file format. Please upload a file with extension .png, .jpeg, or .jpg";
            }
        } else {
            echo "Please select an image file.";
        }
    } else {
        echo "All fields are required.";
    }
}
?>
