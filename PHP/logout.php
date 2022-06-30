<?php
//stop the current session and redirect to the login page (index.php)
session_start();
session_destroy();
header("Location: /HTML/index.php");
?>