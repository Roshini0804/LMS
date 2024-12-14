<?php
require('db.php');
$request_id=$_GET['request_id'];
$query1   = "UPDATE `issued_books` set status='rejected' where request_id='$request_id'";
$result1  = mysqli_query($con, $query1);
header("Location: book_requests.php"); 
?>