<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/loginstyle.css">
    <title>Login Page</title>
</head>
 
 
<body >
 
    <div class="topnav">
        <a class="active" href="/HTML/index.php">Login</a>
        <a href="/HTML/register.php">Register</a>
    </div> 
 
    <form id="loginForm" action="/HTML/index.php" method="post" autocomplete="off">
        <h1>Login</h1>
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <input id="submit" type="submit" value="Login">
        <label id="logLabel">Don't have an account? <a id="registerBtn" href="/HTML/register.html">Register</a></label>
    </form>
</body>
</html>
 
<?php
    session_start();
    
    $con = new mysqli("localhost", "root", "", "test");
    if($con->connect_error) {
        die('Connection failed: ' . $con->connect_error);
    } else {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM registration WHERE username = '$username'";
            $result = $con->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if(password_verify($password, $row['password'])) {
                        $_SESSION ['username'] = $username;
                        header("Location: /HTML/todo.php");
                    }
                }
            } else {
                echo "Username or password is incorrect";
            }
        }
    }
?>
 