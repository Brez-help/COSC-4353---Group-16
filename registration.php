<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="src/style.css"/>
</head>
<body>
    <div class="container">
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $password = md5($password);
        $query    = "INSERT into `loginafule` (username, password)
                     VALUES ('$username', '$password')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                <div class='myform'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                <div class='myform'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  
                  </div>";
                  
        }
    } else {
?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <form class="myform" action="" method="post">
        <div class="form-group">
            <h1 class="login-title">Registration</h1>
        </div>
        <div class="form-group">
            <input type="text" class="login-input" name="username" placeholder="Username" onkeypress="return event.charCode != 32" value='' onpaste="return false" required />
        </div>
        <div class="form-group">
            <input type="password" class="pass" name="password" placeholder="Password" onkeypress="return event.charCode != 32 " maxlength="20">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Register" class="btn">
        </div>
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>

    </div>
</body>
</html>