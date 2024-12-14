<?php
    $book_id=$_GET['book_id'];
    include('db.php');
    $result = mysqli_query($con, "SELECT * from `book` where book_id='$book_id'");
    $row=mysqli_fetch_array($result);
    unlink("bookImages/".$row['imgNamee']);
    mysqli_query($con,"delete from `book` where book_id='$book_id'");
    echo "<div class='form'>
    <h3>Deleted succesfully</h3><br/>
    <p class='link'>Click here to see books<a href='admin_home.php'>Books</a></p>
    </div>";
?>