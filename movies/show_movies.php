<?php
include("header.php");
$conn = mysqli_connect("localhost","root", "", "bvb");
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
                $sql = mysqli_query($conn, "SELECT * FROM recommedation where rec_id='$_GET[researcher_id]'");
                while ($row = mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr>
                        <td><?php echo $row['crop_name']; ?> </td>
                        <td><?php echo $row['rating']; ?> </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

