<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
    <script>
        function validation() {
    var name =
        document.forms.register.name.value;
    var email =
        document.forms.register.email.value;
    var phone =
        document.forms.register.phnum.value;
    var password =
        document.forms.register.password.value;

    var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g; //Javascript reGex for Email Validation.
    var regPhone=/^\d{10}$/;									 // Javascript reGex for Phone Number validation.
    var regName = /\d+$/g;								 // Javascript reGex for Name validation

    if (name == "" || regName.test(name)) {
        alert("Please enter your name properly.");
        return false;
        name.focus();
       
    }

    if (email == "" || !regEmail.test(email)) {
        alert("Please enter a valid e-mail address.");
        return false;
        email.focus();
       
    }
    
    if (password == "") {
        alert("Please enter your password");
        return false;
        password.focus();
    }

    if(password.length <6){
        alert("Password should be atleast 6 character long");
        return false;
        password.focus();

    }
    if (phone == "" || !regPhone.test(phone)) {
        alert("Please enter valid phone number.");
        return false;
        phone.focus();
    }
}
</script>
</head>
<body>
<h3 style="font-size:50px;text-align:center">Library Management SYstem</h1>
<?php
 require('db.php');
    if(isset($_POST['register'])){
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $phnum = stripslashes($_REQUEST['phnum']);
        $phnum = mysqli_real_escape_string($con, $phnum);
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
       
        $query    = "INSERT into `users` (name, email, phnum, username, password)
                     VALUES ('$name','$email', '$phnum', '$username', '$password')";
        $result   = mysqli_query($con, $query);
        if ($result){
            echo "<div class='form'>
            <h3>You have added user successfully</h3><br/>
            <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
            </div>";
            
        } else {
            echo "<div class='form'>
            <h3>Field Missing</h3><br/>
            <p class='link'>Click here to <a href='register.php'>Create an Account</a> again.</p>
            </div>";

        }
    }
    else{
?>
    <form class="form" action="" onsubmit="return validation()" method="post" name="register">
        <h3 class="login-title">Registration</h3>
        <input type="text" class="login-input" name="name" placeholder="Name" required/>
        <input type="text" class="login-input" name="email" placeholder="Email" required/>
        <input type="text" class="login-input" name="phnum" placeholder="Phone Number" required>
        <input type="text" class="login-input" name="username" placeholder="User Name" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit" value="submit" name="register" class="login-button"/>
        <p class="link"><a href="index.php">Login</a></p>
  </form>
<?php
}
?>
</body>
</html>
