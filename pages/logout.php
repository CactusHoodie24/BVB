<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "index.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline";
            $sql = mysqli_query($conn, "UPDATE externalusers SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: home.php");
            }
        }else{
            header("location: landing.php");
        }
    }else{  
        header("location: login2.php");
    }
?>