<?php
require('db.php');
$request_id=$_GET['request_id'];
$query1   = "UPDATE `issued_books` set status='returned' where request_id='$request_id'";
$result1  = mysqli_query($con, $query1);
$query2 = "SELECT * from `issued_books` where request_id='$request_id'";
$result2  = mysqli_query($con, $query2);
while($row = mysqli_fetch_array($result2))
{
$book_id=$row['book_id'];
}
$query3 = "SELECT * from `book` where book_id='$book_id'";
$result3  = mysqli_query($con, $query3);
while($row = mysqli_fetch_array($result3))
{
$quantity=$row['quantity']+1;
}
$query4  = "UPDATE `book` set quantity=$quantity where book_id='$book_id'";
$result4  = mysqli_query($con, $query4);
header("Location:my_issued_books.php")

?>