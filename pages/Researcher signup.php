<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-compatible" content="ie-edge">
        <title>Real time chat app</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="wrapper">
            <section class="form-signup">
            <header>Researcher signup</header>
            <form enctype="multipart/form-data" method="post">
            <div class="error-txt"></div>
            <div class="name-details">
                <div class="field">
                    <label>First Name</label>
                    <input type="text" name="firstName" placeholder="First Name">
                </div>
                <div class="field">
                    <label>last Name</label>
                    <input type="text" name="lastName" placeholder="Last Name">
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="text" name="Email" placeholder="Enter your Email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                </div>
                <div class="field Image">
                    <label>Select Image</label>
                    <input type="file" name="img">
                </div>
                <div class="field button">
                    <input type="submit" value="Submit">
                </div>
            </div>
            </form>
            <div class="link">Already Signed Up? <a href="Login.php">Login now</a></div> 
            </section>

        </div>
<script src="../Javascript/r signup.js"></script>

    </body>
</html>

<?php

