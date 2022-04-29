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
        $temp = $password;
        $password = md5($password);
        $query = "select count(Username) as total from loginafule where Username = '$username'";
        $result = mysqli_query($con,$query);
        $data = mysqli_fetch_assoc($result);
        if (empty($temp)) {//if passowrd is empty
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
                  <h3>Please make password length bewteen 8-20 characters.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        }

        else if (strlen($temp) < 8 && strlen($temp) > 20 && empty($temp)) {//this checks characters
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
                  <h3>Please make password length bewteen 8-20 characters.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        }

        else if ($data['total'] > 0) {//checks if user name is in use
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
                  <h3>Username already in use. Please create a different username.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        }
        else {//successful
            $query    = "INSERT into `loginafule` (username, password)
                     VALUES ('$username', '$password')";
            $result   = mysqli_query($con, $query);
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