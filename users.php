<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Users</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
    <header>
  <div class="container">
    <nav>
        <ul>
            <li><a href="admin_home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href="book_requests.php">Requests</a>&nbsp;&nbsp;</li>
            <li><a href="issued_books.php">Issued Books</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
    
        </ul>
    </nav>
        
</div>
</header>
</head>
<body>
<body>
<h3 class="login-title" style="font-size:50px;text-align:center">Users</h1>
<div class = "form">
<?php
    include('user_session.php');
    require('db.php');
    $query = "SELECT * from `users`";
    $result = mysqli_query($con, $query);
    echo "<table border='1'>
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile Num</th>
    <th>Delete</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['phnum']."</td>";

 ?>
<td><a href="delete_user.php?username=<?php echo $row['username']; ?>">Delete</a></td>
<?php
    }
?>
</div>

</body>
</body>
</html>
