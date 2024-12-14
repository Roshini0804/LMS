<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Requested Books</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
<header>
  <div class="container">
    <nav>
        <ul>
        
            <li><a href="profile.php">Profile</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
    
        </ul>
    </nav>        
</div>
</header>
</head>
<body>
<?php
require('db.php');
include('user_session.php');
$username=$_SESSION['username'];
$book_id = $_GET['book_id'];
$query1=mysqli_query($con, "SELECT * from users where username='$username'");
while($row = mysqli_fetch_array($query1))
{
$user_name=$row['name'];
$user_phnum=$row['phnum'];
}
$query2= "INSERT into `issued_books` (username, name, phnum, book_id, status)
VALUES ('$username', '$user_name','$user_phnum', '$book_id', 'pending')";
$result2 = mysqli_query($con, $query2);
if ($result2) {
echo "<div class='form'>
<h3>Requested Book Successfully</h3><br/>
<p class='link'>Click here to <a href='user_home.php'>Home</a></p>
</div>";
}
?>
</body>
