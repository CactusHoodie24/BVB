<?php
session_start();
include_once "index.php";
$pql = mysqli_query($conn, "SELECT * FROM article");
$output ="";
if(mysqli_num_rows($pql) == 1){
    $output .= "No users are available to chat";
}else if(mysqli_num_rows($pql) > 0){
    include "data3.php";
    echo $output;
}

         
        