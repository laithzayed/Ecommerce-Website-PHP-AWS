<?php
ob_start();
include('includes/connection.php');
include('includes/headerInner.php');


if ($_SESSION['total'] < 50) {
    $delevery_amount = 'JD 5.00';
} else {
    $delevery_amount = 'Free !';
}
$total_with_delevery = $_SESSION['total'] + 5;

if (!isset($_SESSION['user_id'])) {
    header("location: login.php?page=checkout");
}
// if(special != ''){
// $product_final_price = special
// }else{
//     $product_final_price = pro_price
// }

//Fetch old data
$query = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $query);
$row   = mysqli_fetch_assoc($result);


if (isset($_POST['submit'])) {
    //Taking data from form
    $first_name     = $_POST['first_name'];
    $last_name      = $_POST['last_name'];
    $city           = $_POST['city'];
    $address1       = $_POST['address1'];
    $address2       = $_POST['address2'];
    $postal_code    = $_POST['postal_code'];
    $phone_number   = $_POST['phone_number'];
    $total          = $_SESSION['total'];
    $user_id = $_SESSION['user_id'];

    $orders_query = "INSERT INTO orders 
    (order_country,order_city,order_address1,order_address2,user_id,order_amount)
    values('jordan','$city','$address1','$address2','$user_id','$total')";
    mysqli_query($conn, $orders_query);

    $last_order_query = "SELECT order_id FROM orders  ORDER BY order_id DESC LIMIT 1";
    $result2 = mysqli_query($conn, $last_order_query);
    $row2 = mysqli_fetch_assoc($result2);
    $last_order_id = implode($row2);
    print_r($_SESSION['user_id']);
    echo "$last_order_id";


    foreach ($_SESSION["cart"] as $key => $value) {
        $order_details_query = "INSERT INTO order_details (order_id,product_id,order_detail_price,order_detail_quantity)
        values('$last_order_id','{$value['product_id']}','{$value['product_price']}',{$_SESSION['cart'][$key]['product_qty']})";
        mysqli_query($conn, $order_details_query);
    }
    unset($_SESSION["cart"]);
    header("location:cart.php");
}




// $place_order_query = "INSERT INTO admins (admin_email,admin_password,admin_fullname)
// values('$email','$password','$fullname')";
// mysqli_query($connection, $query);

?>

<!--Hero Section-->
<div class="hero-section hero-background">
    <h1 class="page-title">Checkout</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">Checkout</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain checkout">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container sm-margin-top-37px">
            <div class="row">

                <!--checkout progress box-->
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <div class="checkout-progress-wrap">
                        <ul class="steps">
                            <li class="step 1st">
                                <div class="checkout-act active">
                                    <h3 class="title-box"><span class="number">*</span>Delivery Address</h3>
                                    <div class="box-content">
                                        <p class="txt-desc">please fill out your delivery address information </p>
                                        <div class="login-on-checkout">
                                            <form name="frm-login" method="post">
                                                <p class="form-row">
                                                    <label for="firstname">First Name</label>
                                                    <input class='col-lg-12 col-md-12 col-sm-12 col-xs-12' type="Text" name="first_name" id="input_email" value="<?php echo $row['user_firstname'] ?>" placeholder="First Name">
                                                </p>
                                                <p class="form-row">
                                                    <label for="firstname">Last Name</label>
                                                    <input class='col-lg-12 col-md-12 col-sm-12 col-xs-12' type="Text" name="last_name" id="input_email" value="<?php echo $row['user_lastname'] ?>" placeholder="Last Name">
                                                </p>
                                                <p class="form-row">
                                                    <label for="firstname">City</label>
                                                    <input class='col-lg-12 col-md-12 col-sm-12 col-xs-12' type="Text" name="city" id="input_email" value="<?php echo $row['user_city'] ?>" placeholder="City">
                                                </p>
                                                <p class="form-row">
                                                    <label for="firstname">Delivery Address</label>
                                                    <input class='col-lg-12 col-md-12 col-sm-12 col-xs-12' type="Text" name="address1" id="input_email" value="<?php echo $row['user_address1'] ?>" placeholder="Address 1">
                                                </p>
                                                <p class="form-row">
                                                    <label for="firstname">Address 2</label>
                                                    <input class='col-lg-12 col-md-12 col-sm-12 col-xs-12' type="Text" name="address2" id="input_email" value="<?php echo $row['user_address2'] ?>" placeholder="Address 2">
                                                </p>
                                                <p class="form-row">
                                                    <label for="firstname">Postal Code</label>
                                                    <input type="Text" name="postal_code" id="input_email" value="<?php echo $row['user_zip_code'] ?>" placeholder="Postal Code">
                                                </p>
                                                <p class="form-row">
                                                    <label for="firstname">Phone Number</label>
                                                    <input class='col-lg-12 col-md-12 col-sm-12 col-xs-12' type="Text" name="phone_number" id="input_email" value="<?php echo $row['user_phone'] ?>" placeholder="Phone Number">
                                                </p>
                                                <p class="form-row ">
                                                    <button type="submit" name="submit" class="btn lg-margin-top-14px">Place Order</button>
                                                </p>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <!--Order Summary-->
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                    <div class="order-summary sm-margin-bottom-80px">
                        <div class="title-block">
                            <h3 class="title">Order Summary</h3>
                            <a href="cart.php" class="link-forward">Edit cart</a>
                        </div>
                        <div class="cart-list-box short-type">
                            <span class="number">(<?php echo count($_SESSION['cart']) ?> Items)</span>
                            <ul class="cart-list">


                                <?php
                                if (isset($_SESSION["cart"])) {
                                    $items = $_SESSION["cart"];
                                    foreach ($items as $key => $value) {
                                        echo "

                                <li class='cart-elem'>
                                    <div class='cart-item'>
                                        <div class='product-thumb'>
                                            <a class='prd-thumb' href='#'>
                                                <figure><img src='dashboard/{$value['product_image']}' width='113' height='113' alt='shop-cart'></figure>
                                            </a>
                                        </div>
                                        <div class='info'>
                                            <span class='txt-quantity'>{$value['product_qty']} X</span>
                                            <a href='#' class='pr-name'>National Fresh Fruit</a>
                                        </div>
                                        <div class='price price-contain'>
                                            <ins><span class='price-amount'><span class='currencySymbol'>JD </span>{$value['product_special_price']}</span></ins>
                                            <del><span class='price-amount'><span class='currencySymbol'>JD </span>{$value['product_price']}</span></del>
                                        </div>
                                    </div>
                                </li>";
                                    }
                                }
                                ?>

                            </ul>
                            <ul class="subtotal">
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Subotal</b>
                                        <span class="stt-price">JD <?php echo $_SESSION['total']; ?></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Delevery</b>
                                        <span class="stt-price"><?php echo $delevery_amount ?></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">total:</b>
                                        <span class="stt-price">JD <?php if ($delevery_amount == 'Free !') {
                                                                        echo $_SESSION['total'];
                                                                    } else {
                                                                        echo $total_with_delevery;
                                                                    } ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>