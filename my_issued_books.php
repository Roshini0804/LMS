<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>My Issued Books</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
    <header>
  <div class="container">
    <nav>
        <ul>
        <li><a href="admin_home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href="book_requests.php">Requests</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
    
        </ul>
    </nav>
        
</div>
</header>

</head>
<body>
<h3 class="login-title" style="font-size:50px;text-align:center">Books</h1>
<div class = "form">
<?php
    include('user_session.php');
    require('db.php');
    $username = $_SESSION['username'];
    $query = "SELECT * from `issued_books` JOIN `book` ON  issued_books.book_id = book.book_id where status='issued' and username='$username'";
    $result = mysqli_query($con, $query);
    echo "<table border='1'>
    <tr>
    <th>Book </th>
    <th>Return </th>

    </tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$row['book_name']."</td>";
 
 ?>
<td><a href="return.php?request_id=<?php echo $row['request_id']?>">Return</a></td>

<?php
    
  
    
    echo "</tr>";
    }
    echo "</table>";
?>
<p class="link"><a href="pending_requests.php">Pending</a></p>
</div>

</body>