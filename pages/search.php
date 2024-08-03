<?php
session_start();
include_once "index.php";

// Check if the search term is provided
if (isset($_POST['searchTerm'])) {
    // Sanitize the search term
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    
    // Prepare the SQL query
    $query = "SELECT * FROM article WHERE heading LIKE '%$searchTerm%'";
    
    // Execute the query
    $pql = mysqli_query($conn, $query);
    
    // Check if the query was executed successfully
    if($pql === false) {
        // Output or log the MySQL error
        echo "MySQL error: " . mysqli_error($conn);
    } else {
        // Check if there are any results
        if(mysqli_num_rows($pql) > 0){
            // Output search results
            include "data3.php";
        } else {
            // Output message if no results found
            echo "No articles related to your search term";
        }
    }
    
}
?>
