<?php
session_start();
unset($_SESSION['admin_role']);
header('location:index.php');
?>
