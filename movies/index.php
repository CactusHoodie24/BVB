<?php
include("header.php");
$conn = mysqli_connect("localhost","root", "", "bvb");
?>
    <div class="panel-heading">
        <h2>
            <a class="btn btn-success" href="add_users.php"> Add users</a>
            <a class="btn btn-info pull-right" href="../pages/home.php">Back</a>
        </h2>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th> Users Name </th>
                    <th> Show Recommendations </th>
                </tr>
            </thead>
            <tbody>
        
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM researcher");
                while ($row = mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr>
                        <td><?php echo $row['firstName']; ?> </td>
                        <td>
                            <form action="add_movie.php">
                                <input type="submit" name="add_movies" class="btn btn-primary" value="Add Movies">
                                <input type="hidden" name="user_id" value="<?php echo $row['researcher_id']; ?>">
                            </form>
                        </td>
                        <td>
                            <form action="show_movies.php">
                                <input type="submit" name="add_movies" class="btn btn-primary" value="Show Movies">
                                <input type="hidden" name="user_id" value="<?php echo $row['researcher_id']; ?>">
                            </form>
                        </td>
                        <td>
                            <form action="user_recommendation.php">
                                <input type="submit" name="add_movies" class="btn btn-primary" value="Show Recommendations">
                                <input type="hidden" name="user_id" value="<?php echo $row['researcher_id']; ?>">
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="popup">
        <div class="popup-content">
            <h1>X</h1>
            <h2>Subscribe...</h2>
            <p>And some dummy content that shows on this popup Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, ratione quisquam iure libero impedit aspernatur, expedita quaerat mollitia delectus, eius ad excepturi inventore aperiam perspiciatis voluptatum porro. Tenetur libero, aspernatur nobis quod autem assumenda, nostrum esse reiciendis quibusdam vitae iure harum illum similique consectetur ut ipsam, at repellendus! Nulla est debitis illo.</p>
        </div>
    </div>
<script src="sixth.js"></script>
<script>
        const popup = document.querySelector('.popup');
        const x = document.querySelector('.popup-content h1')

        window.addEventListener('load', () => {
            popup.classList.add('showPopup');
            popup.childNodes[1].classList.add('showPopup');
        })
        x.addEventListener('click', () => {
            popup.classList.remove('showPopup');
            popup.childNodes[1].classList.remove('showPopup');
        })
    </script>

