<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Books</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
    <header>
  <div class="container">

    <nav>
        <ul>
            <li><a href="issued_books.php">Issued Books</a>&nbsp;&nbsp;</li>
            <li><a href="book_requests.php">Book Requests</a>&nbsp;&nbsp;</li>
            <li><a href="users.php">Users</a>&nbsp;&nbsp;</li>
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
    require('db.php');
    $query = "SELECT * from `book`";
    $result = mysqli_query($con, $query);
    echo "<table border='1'>
    <tr>
    <th> Image </th>
    <th>Book Name</th>
    <th>Author Name</th>
    <th>Qunatity</th>
    <th>Rack</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td><img src='bookImages/{$row['imgName']}' width='200'></td>";
        echo "<td>".$row['book_name']."</td>";
        echo "<td>".$row['author_name']."</td>";
        echo "<td>".$row['quantity']."</td>";
        echo "<td>".$row['rack']."</td>";

 ?>
<td><a href="update.php?book_id=<?php echo $row['book_id']; ?>">Update</a></td>
 <td><a href="delete.php?book_id=<?php echo $row['book_id']; ?>">Delete</a></td>
 <?php
 }
 ?>
 <p class="link"><a href="addBook.php">Add Book</a></p>
</div>

</body>