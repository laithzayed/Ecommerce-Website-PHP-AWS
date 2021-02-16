<?php
session_start();
if (isset($_GET['key'])) {
  $key = $_GET['key'];

  unset($_SESSION['cart']["$key"]);
}
if (isset($_GET['clearAll'])) {
  unset($_SESSION['cart']);
}

if ($_GET['page'] == 'home') {
  header("location:index.php");
} else {
  header("location:cart.php");
}


