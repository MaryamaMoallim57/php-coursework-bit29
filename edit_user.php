<?php
include '../config/db.php';
$id = $_GET['id'];

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $status = $_POST['user_status'];

    mysqli_query($conn,
    "UPDATE users SET username='$username', user_status='$status' WHERE id=$id");

    header("Location: users.php");
}

$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="center-wrapper">
<div class="card">
<h2>Edit Tenant</h2>

<form method="post">
<input type="text" name="username" value="<?php echo $row['username']; ?>">
<select name="user_status">
<option <?php if($row['user_status']=="Active") echo "selected"; ?>>Active</option>
<option <?php if($row['user_status']=="Not Active") echo "selected"; ?>>Not Active</option>
</select>

<input type="submit" name="update" value="Update Tenant">
</form>
</div>
</div>
