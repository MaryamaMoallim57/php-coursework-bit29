<?php
session_start();
include '../config/db.php';
$result = mysqli_query($conn, "SELECT * FROM users");
?>

<link rel="stylesheet" href="../assets/css/style.css">

<h2>Tenants List</h2>

<table>
<tr>
<th>ID</th>
<th>Tenant Name</th>
<th>Username</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['user_status']; ?></td>
<td>
<a class="button" href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a>
<a class="button" href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>
</tr>
<?php } ?>
</table>
