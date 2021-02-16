<?php
include "includes/connection.php";

$query = "SELECT * FROM products WHERE pro_id = {$_GET['cart_id']}";
$result = mysqli_query($conn, $query);
$row =  mysqli_fetch_assoc($result);

$new_item = array(
    "product_id"            => $row['pro_id'],
    "product_image"         => $row['pro_image'],
    "product_name"          => $row['pro_name'],
    "product_price"         => $row['pro_price'],
    "product_qty"           => 1,
    "product_special_price" => $row['pro_special_price']
);
if (!isset($_SESSION["cart"])) {
    $cart_items = array();
    $_SESSION["cart"] = $cart_items;
}

array_push($_SESSION["cart"], $new_item);



$page = $_GET['page'];

if ($_GET['page'] == 'home') {
    header("Location: index.php");
} elseif ($_GET['page'] == 'all_products') {
    header("Location: all_products.php?id=$_GET[id]");
} elseif ($_GET['page'] == 'product') {
    header("Location: cart.php");
} elseif ($_GET['page'] == 'category_grid') {
    header("Location: category_grid.php");
}elseif ($_GET['page'] == 'single_product') {
        header("Location: cart.php");
} else {
    header("Location: index.php");
}
