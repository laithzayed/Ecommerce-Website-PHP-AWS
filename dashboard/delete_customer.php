<?php
include('includes/connection.php');
include('includes/check_admin.php');

$query = "DELETE FROM users where user_id = {$_GET['id']}";

mysqli_query($conn, $query);

header("location:manage_customer.php");
