<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Add Books</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
    <header>
  <div class="container">
    <nav>
        <ul>
            <li><a href="users.php">Users</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
    
        </ul>
    </nav>
        
</div>
</header>
</head>
<body>
<?php
    require('db.php');
    if(isset($_POST['submit'])){
        $bookName = stripslashes($_REQUEST['bookName']);
        $bookName = mysqli_real_escape_string($con, $bookName);
        $authorName = stripslashes($_REQUEST['bookName']);
        $authorName = mysqli_real_escape_string($con, $bookName);
        $quantity = stripslashes($_REQUEST['quantity']);
        $quantity = mysqli_real_escape_string($con, $quantity);
        $rack = stripslashes($_REQUEST['rack']);
        $rack = mysqli_real_escape_string($con, $rack);
        $imageName = $_FILES['bookImg']['name'];
        $destination = 'bookImages/'. $imageName;
        move_uploaded_file($_FILES['bookImg']['tmp_name'], $destination);

        $query    = "INSERT into `book` (book_name, author_name, quantity, rack, imgName)
                     VALUES ('$bookName','$authorName', '$quantity', '$rack','$imageName')";
        $result   = mysqli_query($con, $query);
        if ($result){
            echo "<div class='form'>
            <h3>You haved added book successfully</h3><br/>
            <p class='link'>Click here to <a href='admin_home.php'>Add Books</a> again.</p>
            </div>";
            
        } else {
            echo "<div class='form'>
            <h3>Field Missing</h3><br/>
            <p class='link'>Click here to <a href='admin_home.php'>Add Books</a> again.</p>
            </div>";

        }
    }
    else{
?>
<h3 style="font-size:50px;text-align:center">Books</h1>
    <form class="form" action="" method="post" name="addproducts" enctype="multipart/form-data">
        <h3 class="login-title">Add Book</h3>
        <input type="file" class="login-input" name="bookImg" placeholder="Book Image"/>
        <input type="text" class="login-input" name="bookName" placeholder="Book Name" required/>
        <input type="text" class="login-input" name="authorName" placeholder="Author Name" required/>
        <input type="text" class="login-input" name="quantity" placeholder="Quantity" required/>
        <input type="text" class="login-input" name="rack" placeholder="Rack" required>
        <input type="submit" value="Add Book" name="submit" class="login-button"/>
  </form>
<?php
}
?>
</body>
</html>