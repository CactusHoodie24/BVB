<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header('location: home.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-compatible" content="ie-edge">
        <title>Real time chat app</title>
        <link rel="stylesheet" href="../css/style-users.css">
        <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="wrapper">
            <section class="chat-area">
                <header>
                    <?php
                    include_once "index.php";
        $user_id = mysqli_real_escape_string($conn, $_GET['researcher_id']);
        $sql = mysqli_query($conn, "SELECT * FROM researcher WHERE unique_id = {$user_id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          header("location: Main-dash.php");
        }
                    ?>
                    <a href="Main-dash.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
                    <img src="../images/<?php echo $row['img'] ?>" alt="">
                    <div class="details">
                    <span><?php echo $row['firstName']."   " .$row['lastName'] ?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </header>
                <div class="chat-box">
                    
                </div>
                <form action="users inc.php" class="typing-area">
                <input type="text" class="outgoing_id" name="outgoing_msg_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" class="incoming_id" name="incoming_msg_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here.....">
    <button><i class="fa fa-paper-plane"></i></button>
</form>

            </section>

        </div>
        <script src="../Javascript/users.js"></script>
    </body>
</html>