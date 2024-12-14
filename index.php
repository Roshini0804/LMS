<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <h1 style="font-size:50px;text-align:center;color:#000000;background-color:white">Library Management System</h1>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
require('db.php');
session_start();
if(isset($_POST['username'])){
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $usertype = stripslashes($_REQUEST['usertype']);
    $_SESSION['username'] =$username;
    $usertype = mysqli_real_escape_string($con, $usertype);
    $query    = "SELECT * FROM `users` WHERE username='$username'
    AND password='$password'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    if ($username=='Admin' and $password=='Admin' and $usertype=='Admin'){
        header("Location: admin_home.php");
    }
    else if ($rows == 1 ) {
        header("Location: user_home.php");}
    else {
        echo "<div class='form'>
              <h3>Incorrect Username/password.</h3><br/>
              <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
              </div>";
    }
} else{

?>

<title style="font-size:50px;text-align:center;color:#000000">Library Management System</title>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="radio" id="usertype" name="usertype" value="User"><label for="User">User</label>
        <input type="radio" id="usertype" name="usertype" value="Admin"><label for="Admin">Admin</label>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="forgot_password.php">Forgot Password</a></p>
        <p class="link"><a href="register.php">Create an Account</a></p>
</form>
<?php
    }
?>

</body>
</html>