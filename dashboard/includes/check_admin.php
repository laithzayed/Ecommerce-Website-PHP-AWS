<?php
//Send back to home page if not logged in
if (!isset($_SESSION['admin_role'])) {
    header('location:index.php');
}
