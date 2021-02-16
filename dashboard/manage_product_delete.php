<?php 
include('includes/connection.php');
include('includes/check_admin.php');

//delete
$query = "DELETE FROM products WHERE pro_id = {$_GET['id']}";
$result = mysqli_query($conn,$query);
header("location:manage_product.php");



?>