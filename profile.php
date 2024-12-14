<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Update</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
    <header>
  <div class="container">
    <nav>
        <ul>

            <li><a href="user_home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
    
        </ul>
    </nav>
        
</div>
</header>
</head>
<body>
<?php
	include('db.php');
	require('user_session.php');
	$username = $_SESSION['username'];
	$query=mysqli_query($con,"select * from `users` where username='$username'");
	$row=mysqli_fetch_array($query);
?>
<form class="form" method="POST" name="update" action="confirm_profile_update.php?username=<?php echo $username; ?>">
    <h1 class="login-title">Update</h1>
		<label>Email</label><input type="text" class="login-input" value="<?php echo $row['email']; ?>" name="email">
		<label>Phonenum</label><input type="text" class="login-input" value="<?php echo $row['phnum']; ?>" name="phnum">
		<label>Passowrd</label><input type="password" class="login-input" value="<?php echo $row['password']; ?>" name="password">
		<input type="submit" class="login-button" name="update">
		<p class="link"><a href="user_home.php">Home</a><p>
	</form>
</body>
</html>