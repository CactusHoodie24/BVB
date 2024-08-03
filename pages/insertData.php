<?php

include_once 'index.php';
$conn = mysqli_connect("localhost","root","","bvb");



     $dummyName = $_POST['climateDate'];
     $location = $_POST['temperature'];
     $address = $_POST['rainfall'];
     $iv = $_POST['humidity'];
     $windspeed = $_POST['windspeed'];

     $pql = "INSERT INTO climate (climateDate,temperature,rainfall,humidity,windspeed) VALUES ('$dummyName','$location','$address','$iv','$windspeed')";
     if (mysqli_query($conn, $pql)) {
        echo "Register successful";
     } else {
        echo "failed to register";
     }
    

?>