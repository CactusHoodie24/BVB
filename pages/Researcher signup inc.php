<?php
session_start();
include_once 'index.php';
$conn = mysqli_connect("localhost", "root", "", "bvb");

$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$Email = mysqli_real_escape_string($conn, $_POST['Email']);






if (!empty($firstName) && !empty($password) && !empty($Email)) {
    if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $pql = mysqli_query($conn, "SELECT email FROM researcher WHERE Email ='{$Email}'");
        if (mysqli_num_rows($pql) > 0) {
            echo "$Email - This email already exists";
        } else {
            if(isset($_FILES['img'])){
            $img_name = $_FILES['img']['name'];
            $tmp_name = $_FILES['img']['tmp_name'];

            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);


        $extensions = ['png', 'jpeg', 'jpg'];
         if(in_array($img_ext, $extensions) === true){
            $time = time();
            $new_img_name = $time.$img_name;
         }
                // Save the image file to the server
                if (move_uploaded_file($tmp_name, "../images/" .$new_img_name)) {
                    $status = "Active Now";
                    $random_id = rand(time(), 100000000);
                    $pql2 = mysqli_query($conn, "INSERT INTO researcher (unique_id, firstName, lastName, Email, password, img, status) VALUES ({$random_id}, '{$firstName}', '{$lastName}', '{$Email}', '{$password}', '{$new_img_name}',  '{$status}')");     
                    if ($pql2) {
                        $pql1 = mysqli_query($conn, "SELECT * FROM researcher WHERE firstName = '{$firstName}'");
                        if (mysqli_num_rows($pql1) > 0) {
                            $row = mysqli_fetch_assoc($pql1);
                            $_SESSION['unique_id'] = $row['unique_id'];
                            echo "success";
                        } else {
                            echo "something went wrong";
                        }

                    }
                }else {
                    echo "Please select an image File - jpeg, jpg, png";
                }
                    } else {
                        echo "Please select an image file";
                    }
                }
          
        } else {
    echo "$Email-This is is an invalid email";
} 
}else {
    echo "All input fields are required";
}
?>
