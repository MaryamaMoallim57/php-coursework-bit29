<?php
session_start();

// Destroy session
session_destroy();

// Destroy remember-me cookie
setcookie("remember_user", "", time() - 3600, "/");

header("Location: login.php");
exit;
?>
