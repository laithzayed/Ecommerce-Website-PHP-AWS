<?php
include('includes/connection.php');
include('includes/check_admin.php');

$query = "DELETE FROM admins where admin_id = {$_GET['id']}";

mysqli_query($conn, $query);

header("location:manage_admin.php");
