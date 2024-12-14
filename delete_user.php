<?php
    $username=$_GET['username'];
    include('db.php');
    mysqli_query($con,"delete from `users` where username='$username'");
    echo "<div class='form'>
    <h3>Deleted succesfully</h3><br/>
    <p class='link'>Click here to see users<a href='users.php'>Users</a></p>
    </div>";
?>