<?php
session_start();
include 'config/db.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['password'])) {

        // Create session
        $_SESSION['user'] = $row['username'];

        // Remember Me cookie (7 days)
        if (isset($_POST['remember'])) {
            setcookie("remember_user", $row['username'], time() + (86400 * 7), "/");
        }

        header("Location: dashboard/dashboard.php");
        exit;
    } else {
        $error = "Invalid login details";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tenant Login</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav>
<div class="logo">Tenant Management System</div>
</nav>

<div class="center-wrapper">
<div class="card">
<h2>Tenant Login</h2>

<?php if (isset($error)) echo "<p style='color:red;text-align:center;'>$error</p>"; ?>

<form method="post">
    <input type="text" name="username" placeholder="Tenant Username" required>
    <input type="password" name="password" placeholder="Tenant Password" required>

    <label style="display:block;margin:10px 0;">
        <input type="checkbox" name="remember"> Remember Me
    </label>

    <input type="submit" name="login" value="Login">
</form>
<p style="text-align:center;margin-top:10px;">
    <a href="forgot_password.php">Forgot Password?</a>
</p>


<p style="text-align:center;margin-top:10px;">
<a href="register.php">Register as Tenant</a>
</p>

</div>
</div>

</body>
</html>
