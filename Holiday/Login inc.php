<?php  
    session_start();

   include_once "index.php";
   if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] > time()) {
    // User is blocked, display an error message or redirect
    echo "You are temporarily blocked. Please try again later.";
    
    
}

     $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password =  mysqli_real_escape_string($conn,$_POST['password']);
    $max_attempts = 3;
    
       
 if (!empty($email) && !empty($password)) {
        $pql = mysqli_query($conn, "SELECT * FROM users WHERE email ='{$email}' AND password = '{$password}'");
       if (mysqli_num_rows($pql) > 0) {
        $row = mysqli_fetch_assoc($pql);
        //$status = "Active Now";
               // $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
       $_SESSION['unique_id'] = $row['unique_id'];
        $_SESSION['login_attempts'] = 0;
        echo "success";
        

    } else {
        $_SESSION['login_attempts']++;
        // Incorrect login - increment the login attempt counter
        echo "Password is incorrect";
    }
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
    }
    
    // Define the maximum allowed login attempts
    
    
    if ($_SESSION['login_attempts'] >= $max_attempts) {
        // Too many login attempts - block the user or redirect to a CAPTCHA page
        echo "Too many login attempts";
        $_SESSION['login_attempts'] = time() + 300;
        exit;
    }
} else {
    // Incorrect login - increment the login attempt counter
    echo "All fields are required";
}
 ?>

