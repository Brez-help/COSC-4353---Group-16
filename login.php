<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="src/style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $password = md5($password);
        // Check user is exist in the database TIMM
        $query    = "SELECT * FROM `loginafule` WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: Account.php");
        } else {
            echo "<div class='myform'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
                  
        }
    } else {
?>
    <div class="container">
    <form class="myform" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <br>
        <div class = "form-group">
            <input type="text"  name="username" placeholder="Username" autofocus="true"/>
        </div>
        <div class="form-group">
            <input type="password" class="pass" name="password" placeholder="Password"/>
        </div>
        <div class="form-group">
            <input type="submit" value="Login" name="submit" class="btn"/>
        </div>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
  </div>
<?php
    }
?>
</body>
</html>