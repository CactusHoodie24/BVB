<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </head>
    <div class="container">
        <h2><div class="well text-center">RECOMMENDATION FOR YOU</div></h2>
    </div>
    </html>
<?php

$conn = mysqli_connect("localhost","root", "", "bvb");
include("recommendation.php");
$movies=mysqli_query($conn, "select * from recommedation");

$matrix=array();

while($movie=mysqli_fetch_array($movies))
{
    $users=mysqli_query($conn, "select firstName from researcher where researcher_id=$movie[researcher_id]");
    $fname=mysqli_fetch_array($users);

    $matrix[$fname['firstName']][$movie['crop_name']]=$movie['rating'];
}

$users=mysqli_query($conn, "select firstName from researcher where researcher_id=$_GET[researcher_id]");
$fname=mysqli_fetch_array($users);


?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            <a class="btn btn-success" href="add_users.php"> Add users</a>
            <a class="btn btn-info pull-right" href="index.php">Back</a>
        </h2>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th> Movie Name </th>
                    <th> Movie Rating </th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                $recommendation=array();
                $recommendation=getRecommendation($matrix, $fname['firstName']);  

                foreach($recommendation as $movie=>$rating)
                {

                
                    ?>
                    <tr>
                        <td><?php echo $movie; ?> </td>
                        <td><?php echo $rating; ?> </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

