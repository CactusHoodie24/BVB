<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header('location: home.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-compatible" content="ie-edge">
        <title>User Admin</title>
        <link rel="stylesheet" href="login.css">
        <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
        <link rel="stylesheet" href="../Chat/font-awesome-4.7.0/css/font-awesome.min.css">
    </head>
 
    <body>
        <div class="wrapper">
            <section class="form-signup login">
            <header>Login</header>
            <form action="#" enctype="multipart/form-data">
            <div class="error-txt"></div>
            <div class="name-details">
                <div class="field">
                    <label>firstName</label>
                    <input type="text" name="firstname" placeholder="Enter your Name">
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter new Password">
                    <i class="fa fa-eye"></i>
                </div>

                <div class="field button">
                    <input type="submit" name="login"  value="continue to chat">
                </div>
            </div>
            </form>
            <div class="link">Not Signed Up? <a href="signup.php">Sign up now</a></div> 
            </section>

        </div>
        <script src="../Javascript/suu.js"></script>
        <script src="../Javascript/authenticate.js"></script>
    </body>
</html>