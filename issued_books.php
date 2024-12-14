<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Issued Books</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
    <header>
  <div class="container">
    <nav>
        <ul>
        <li><a href="admin_home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href="book_requests.php">Requests</a>&nbsp;&nbsp;</li>
            <li><a href="users.php">Users</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li
    
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
    $query = "SELECT * from `issued_books` JOIN `book` ON  issued_books.book_id = book.book_id where status='issued'";
    $result = mysqli_query($con, $query);
    echo "<table border='1'>
    <tr>
    <th>Name </th>
    <th>Phone Number</th>
    <th>Book</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['phnum']."</td>";
        echo "<td>".$row['book_name']."</td>";
 
 ?>


<?php
    
  
    
    echo "</tr>";
    }
    echo "</table>";
?>
</div>

</body>