<?php
session_start();
include 'config/db.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check) == 1) {
        $_SESSION['reset_user'] = $username;
        header("Location: reset_password.php");
        exit;
    } else {
        $error = "Username not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav>
<div class="logo">Tenant Management System</div>
</nav>

<div class="center-wrapper">
<div class="card">
<h2>Forgot Password</h2>

<?php if (isset($error)) echo "<p style='color:red;text-align:center;'>$error</p>"; ?>

<form method="post">
    <input type="text" name="username" placeholder="Enter your username" required>
    <input type="submit" name="submit" value="Continue">
</form>

<p style="text-align:center;margin-top:10px;">
    <a href="login.php">Back to Login</a>
</p>

</div>
</div>

</body>
</html>
