<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/registerstyle.css">
    <title>Register</title>
</head>
<body >

    <div class="topnav">
        <a href="/HTML/index.php">Login</a>
        <a class="active" href="/HTML/register.php">Register</a>
    </div> 

    <form id="registerForm" action="/HTML/register.php" method="post" autocomplete="off">
        <h1>Register</h1>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <label for="Cpassword">Confirm Password:</label>
        <input type="Cpassword" name="Cpassword" id="Cpassword" required>
        <label for="Email">Email:</label>
        <input type="email" name="email" id="email" required>
        <input id="submit" type="submit" value="Register">
        <label id="regLabel">Already have an account? <a id="loginBtn" href="/HTML/index.php">Login</a></label>
    </form>

    
    
</body>
</html>

<?php
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            
            $username = $_POST['username'];
            //hash the password
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $email = $_POST['email'];


            $stmt = $conn->prepare("INSERT INTO registration(username, password, email) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $password, $email);
            $stmt->execute();
            $stmt->close();
            //go to login page
            header("Location: /HTML/index.php");
            $conn->close();
        }
    }
?>