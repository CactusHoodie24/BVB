<?php
include_once "index.php";


$searchResults = "";

if(isset($_GET['search'])) {
   

    $search = mysqli_real_escape_string($conn, $_GET['search']);

    
    $sql = "SELECT * FROM article WHERE heading LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            $searchResults .= "ID: " . $row["heading"]. " - Description: " . $row["description"]. " - Date: " . $row["article_date"]. "\n";
           
        }
    } else {
        $searchResults = "No results found.";
    }

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Blog Post </title>
    <link rel="stylesheet" href="../css/style-article.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <h2>Post</h2>
        <div class="textbox">
        <div class="textbox-box">
            <div class="textbox-face textbox-side"></div>
            <div class="textbox-face textbox-bottom"></div>
            <div class="textbox-face textbox-top"></div>
            <div class="textbox-field">
            <form method="GET" action="">
                <div class="textbox-label">Article Title</div>
                <input class="textbox-text" name="search" type="text" placeholder="Type here..." />
            </div>
            <div class="textbox-action">
                <div class="textbox-face textbox-side"></div>
                <div class="textbox-face textbox-top"></div>
                <div class="textbox-face textbox-bottom"></div>
                <button><i class="fa fa-search"></i></button>
</form>
            </div>
        </div>
    </div>
        <div class="blog-post">
           
        </div>
    </div>
    
    <?php
    if (!empty($searchResults)) {
        echo "<script>alert(".json_encode($searchResults).");</script>";
    }
    ?>
</body>
<script src="../Javascript/article.js"></script>
</html>
