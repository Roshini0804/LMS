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
            <li><a href="my_issued_books.php">Books</a>&nbsp;&nbsp;</li>
            <li><a href="profile.php">Profile</a>&nbsp;&nbsp;</li>
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
   # include('user_session.php');
    require('db.php');
    include('user_session.php');
    $query = "SELECT * from `book`";
    $result = mysqli_query($con, $query);
    echo "<table border='1'>
    <tr>
    <th> Image </th>
    <th>Book Name</th>
    <th>Author Name</th>
    <th>Qunatity</th>
    <th>Rack</th>
    <th>Issue</th>
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

<td><a href="request_book.php?book_id=<?php echo $row['book_id'];?>">Request</a></td>

<?php
    
  
    
    echo "</tr>";
    }
    echo "</table>";
?>
</div>

</body>