<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Update</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
	include('db.php');
	$book_id=$_GET['book_id'];
	$query=mysqli_query($con,"select * from `book` where book_id='$book_id'");
	$row=mysqli_fetch_array($query);
?>
<form class="form" method="POST" name="update" action="confirm_update.php?book_id=<?php echo $book_id; ?>">
    <h1 class="login-title">Update</h1>
		<label>Author</label><input type="text" class="login-input" value="<?php echo $row['author_name']; ?>" name="author">
		<label>Qunatity</label><input type="text" class="login-input" value="<?php echo $row['quantity']; ?>" name="quantity">
		<label>Rack</label><input type="text" class="login-input" value="<?php echo $row['rack']; ?>" name="rack">
		<input type="submit" class="login-button" name="update">
		<p class="link"><a href="admin_home.php">Book</a><p>
	</form>
</body>
</html>