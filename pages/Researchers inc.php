<?php
session_start();
include_once "index.php";
$outgoing_id = $_SESSION['unique_id'];
$pql = mysqli_query($conn, "SELECT * FROM externalusers");
$output ="";
if(mysqli_num_rows($pql) == 1){
    $output .= "No users are available to chat";
}else if(mysqli_num_rows($pql) > 0){
    include "data.php";
    echo $output;
}

         
        