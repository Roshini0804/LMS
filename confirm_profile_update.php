<?php
	include('db.php');
	$username=$_GET['username'];
	$email=$_POST['email'];
    $phnum=$_POST['phnum'];
    $password=$_POST['password'];
	mysqli_query($con,"update `users` set phnum='$phnum', email='$email', password='$password' where username='$username'");
	echo "<div class='form'>
    <h3>Updated succesfully</h3><br/>
    <p class='link'>Click here to see available books<a href='user_home.php'>Home</a></p>
    </div>";
?>