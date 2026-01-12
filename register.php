<?php
include 'config/db.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $sex = $_POST['sex'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $type = $_POST['user_type'];
    $status = $_POST['user_status'];

    $sql = "INSERT INTO users 
    (first_name,last_name,sex,username,password,phone,email,user_type,user_status)
    VALUES ('$fname','$lname','$sex','$username','$password','$phone','$email','$type','$status')";

    mysqli_query($conn, $sql);
    header("Location: login.php");
}
?>

<link rel="stylesheet" href="assets/css/style.css">

<nav><div class="logo">Tenant Management System</div></nav>

<div class="center-wrapper">
<div class="card">
<h2>Tenant Registration</h2>

<form method="post">
<input type="text" name="first_name" placeholder="Tenant First Name" required>
<input type="text" name="last_name" placeholder="Tenant Last Name" required>

<select name="sex">
<option>Male</option>
<option>Female</option>
</select>

<input type="text" name="username" placeholder="Tenant Username" required>
<input type="password" name="password" placeholder="Tenant Password" required>
<input type="text" name="phone" placeholder="Phone Number">
<input type="email" name="email" placeholder="Email Address">

<select name="user_type">
<option>Tenant</option>
<option>Admin</option>
</select>

<select name="user_status">
<option>Active</option>
<option>Not Active</option>
</select>

<input type="submit" name="submit" value="Register Tenant">
</form>
</div>
</div>
