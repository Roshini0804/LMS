<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
<header>
<div class="container">
    <nav>
        <ul>
            <li><a href="admin_home.php">Home</a>&nbsp;&nbsp;</li>
            <li><a href="issued_books.php">Issued Books</a>&nbsp;&nbsp;</li>
            <li><a href="users.php">Users</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
        </ul>
    </nav>
        
</div>
</header>
</head>
<body>
<div class="form">
<?php
    require('db.php');
    include('user_session.php');
    $query=mysqli_query($con, "SELECT * from `issued_books` where status='pending'");
    $rows_count = mysqli_num_rows($query);
    if ($rows_count>=1){
    echo "<table border='1'> 
    <tr>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Book ID</th>
    <th>Approve</th>
    <th>Reject</th>
    </tr>";
    while($row = mysqli_fetch_array($query))
    {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['phnum'] . "</td>";
    echo "<td>" . $row['book_id'] . "</td>";
    ?>
    <td><a href="approve.php?request_id=<?php echo $row['request_id']?>">Approve</a></td>
    <td><a href="reject.php?request_id=<?php echo $row['request_id']?>">Reject</a></td>
    <?php
    echo "</tr>";
    }
    echo "</table>";
    }
    else{
        echo "<h3>You don't have any requests</h3>";
    }
?>
</div>
</body>
</html>