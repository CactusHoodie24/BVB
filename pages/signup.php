<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-compatible" content="ie-edge">
        <title>Signup</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="wrapper">
            <section class="form-signup">
            <header>Realtime Chat App</header>
            <form action="" enctype="multipart/form-data" method="post">
            <div class="error-txt"></div>
            <div class="name-details">
                <div class="field">
                    <label>First Name</label>
                    <input type="text" name="firstname" placeholder="First name">
                </div>
                <div class="field">
                    <label>last Name</label>
                    <input type="text" name="lastname" placeholder="First name">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="password">
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Enter your Email">
                </div>
                <div class="field Image">
                    <label>Select Image</label>
                    <input type="file" name="img">
                </div>
                <div class="field">
                    <label>phone number</label>
                    <input type="text" name="phone_number" placeholder="Enter your phone number">
                </div>
                <div class="field">
                    <label>location</label>
                    <input type="text" name="location" placeholder="Enter your location">
                </div>
               
                <div class="field button">
                    <input type="submit" value="Submit">
                </div>
            </div>
            </form>
            <div class="link">Already Signed Up? <a href="login2.php">Login now</a></div> 
            </section>

        </div>
<script src="../Javascript/signup.js"></script>

    </body>
</html>

<?php

