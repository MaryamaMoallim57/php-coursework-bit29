<?php
session_start();
include 'config/db.php';

if (!isset($_SESSION['reset_user'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['reset'])) {
    $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $username = $_SESSION['reset_user'];

    mysqli_query($conn, "UPDATE users SET password='$new_password' WHERE username='$username'");

    unset($_SESSION['reset_user']);
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav>
<div class="logo">Tenant Management System</div>
</nav>

<div class="center-wrapper">
<div class="card">
<h2>Reset Password</h2>

<form method="post">
    <input type="password" name="password" placeholder="New Password" required>
    <input type="submit" name="reset" value="Reset Password">
</form>

</div>
</div>

</body>
</html>
