<?php
session_start();

/* AUTO LOGIN USING COOKIE */
if (!isset($_SESSION['user']) && isset($_COOKIE['remember_user'])) {
    $_SESSION['user'] = $_COOKIE['remember_user'];
}

/* PROTECT PAGE */
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tenant Dashboard</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<nav>
<div class="logo">Tenant Management System</div>
</nav>

<div class="container">

<aside>
<h3>Tenant Panel</h3>
<a href="dashboard.php">Dashboard</a>
<a href="users.php">Manage Tenants</a>
<a href="../logout.php">Logout</a>
</aside>

<main>
<h1>Tenant Dashboard</h1>
<p>Welcome, <b><?php echo $_SESSION['user']; ?></b></p>

<?php
if (isset($_COOKIE['remember_user'])) {
    echo "<p><small>Remember Me is enabled</small></p>";
}
?>

<p>You can manage tenant records and system access from this dashboard.</p>
</main>

</div>

</body>
</html>
