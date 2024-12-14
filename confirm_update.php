<?php
	include('db.php');
	$book_id=$_GET['book_id'];
	$author=$_POST['author'];
    $rack=$_POST['rack'];
    $quantity=$_POST['quantity'];
	mysqli_query($con,"update `book` set author_name='$author', rack='$rack', quantity='$quantity' where book_id='$book_id'");
	echo "<div class='form'>
    <h3>Updated succesfully</h3><br/>
    <p class='link'>Click here to see Rooms<a href='admin_home.php'>Book</a></p>
    </div>";
?>