<?php
include('includes/connection.php');
include('includes/headerInner.php');
$total = 0;
if (isset($_SESSION['cart'])) {
    $count_items = count($_SESSION['cart']);
}

// $old_qty = [$key]['product_qty'];

if (isset($_POST['update'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        foreach ($value as $x => $y) {
            // $new_qty = $_POST[$key];
            // array_push($_SESSION['cart'][$key]['product_qty'], 7);
            // $_SESSION['cart'][]['product_qty'] = '7';
            // print_r($new_qty);
            // $value['product_qty'] =  '8';
            $_SESSION['cart'][$key]['product_qty'] = $_POST[$key];
            // print_r($_SESSION['cart'][1]);
            // print_r($value['product_qty']);
            // echo "<br>";
        }
    }
    // print_r($_SESSION['cart']);
}
// if (isset($_POST['qty'])) {
//     $_SESSION['cart']['product_qty'] = $_POST['qty'];
//     $old_qty =  $_SESSION['cart']['product_qty'];
// } else {
//     $old_qty = 1;
// }



?>
<div class="popup" popup-name="popup-1">
    <div class="popup-content">
        <h1>Your cart is empty</h1>
        <a class="close-button" popup-close="popup-1" href="javascript:void(0)">x</a>
    </div>
</div>
<!--Hero Section-->
<div class="hero-section hero-background">
    <h1 class="page-title">Shopping Cart</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain shopping-cart">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container">

            <!--Top banner-->
            <div class="top-banner background-top-banner-for-shopping min-height-346px">
                <h3 class="title" style="font-size:20pt;">Free Deilvery</h3>
                <br>
              
             
                <h3>Free Shipping for all Order of 50 JOD</h3>
                <br>
                
                <!-- <ul class="list">
                    <li>
                        <div class="price-less">
                            <span class="desc">Purchase amount</span>
                            <span class="cost">$0.00</span>
                        </div>
                    </li>
                    <li>
                        <div class="price-less">
                            <span class="desc">Credit on billing statement</span>
                            <span class="cost">$0.00</span>
                        </div>
                    </li>
                    <li>
                        <div class="price-less sum">
                            <span class="desc">Cost affter statemen credit</span>
                            <span class="cost">$0.00</span>
                        </div>
                    </li>
                </ul> -->
                <p class="btns">
                    <a href="all_products.php" class="btn">Get It Now!</a>
                 
                </p>
            </div>

            <!--Cart Table-->
            <div class="shopping-cart-container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="box-title">Your cart items</h3>
                        <form class="shopping-cart-form" action="#" method="post">
                            <table class="shop_table cart-form">
                                <thead>
                                    <tr>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if (isset($_SESSION["cart"])) {
                                        $items = $_SESSION["cart"];
                                        foreach ($items as $key => $value) {
                                            if ($value['product_special_price'] == 0) {
                                                $scene1 = TRUE;
                                                $price = $value['product_price'];
                                            } elseif ($value['product_special_price'] != '') {
                                                $scene2 = TRUE;
                                                $price = $value['product_special_price'];
                                            } else {
                                                $scene1 = TRUE;
                                                $price = $value['product_price'];
                                            }
                                            $old_qty = $value['product_qty'];
                                            $product_total =  $price * $old_qty;
                                            //  else {
                                            //   $product_total =  $price;
                                            // }
                                            $total += $product_total;
                                            echo "
                                    <tr class='cart_item'>
                                        <td class='product-thumbnail' data-title='Product Name'>
                                            <a class='prd-thumb' href='#'>
                                                <figure><img width='113' height='113' src='../dashboard/{$value['product_image']}' alt='shipping cart'></figure>
                                            </a>
                                            <a class='prd-name' href='single_product.php?id={$value['product_id']}'>{$value['product_name']}</a>
                                            <div class='action'>
                                                <a href='delete_cart_item.php?key=$key' class='remove'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                                            </div>
                                        </td> 
                                        <td class='product-price' data-title='Price'>
                                            <div class='price price-contain'>";
                                           
                                            if ($scene2) {
                                                echo "
                                                <ins><span class='price-amount'><span class='currencySymbol'>JD </span>{$value['product_special_price']}</span></ins>
                                                <del><span class='price-amount'><span class='currencySymbol'>JD </span>{$value['product_price']}</span></del>";
                                            } else {
                                                echo "
                                                <ins><span class='price-amount'><span class='currencySymbol'>JD </span>{$value['product_price']}</span></ins>";
                                            }
                                            echo "</div>
                                        </td>
                                        <td class='product-quantity' data-title='Quantity'>
                                            <div class='quantity-box type1'>         
                                                <div class='qty-input'>
                                                    <input id='qty' name='$key' type='number' value='$old_qty' data-max_value='200' data-min_value='1' data-step='1' >
                                                </div>
                                            </div>
                                        </td>
                                        <td class='product-subtotal' data-title='Total'>
                                            <div class='price price-contain'>
                                                <ins><span class='price-amount'><span class='currencySymbol'>JD </span>$product_total</span></ins>
                                            </div
                                        </td>
                                    </tr>";
                                        }
                                    }
                                    $cart_total = $total;
                                    $_SESSION['total'] = $cart_total;
                                    ?>

                                    
                                    <tr class="cart_item wrap-buttons">
                                        <td class="wrap-btn-control" colspan="4">
                                            <a href='all_products.php' class="btn back-to-shop">Back to Shop</a>
                                            <button class="btn btn-update" type="submit" name="update">update</button>
                                            <a href="delete_cart_item.php?clearAll=1" class="btn btn-clear" type="reset">clear all</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="shpcart-subtotal-block">
                            <div class="subtotal-line">
                                <b class="stt-name">Total <span class="sub">(<?php if (isset($count_items)) {
                                                                                    echo "$count_items";
                                                                                } ?> Items)</span></b>
                                <span class="stt-price">JOD <?php echo "$total" ?></span>
                            </div>
                            <!-- <div class="subtotal-line">
                                <b class="stt-name">Shipping</b>
                                <span class="stt-price">£0.00</span>
                            </div>
                            <div class="tax-fee">
                                <p class="title">Est. Taxes & Fees</p>
                                <p class="desc">Based on 56789</p>
                            </div> -->
                            <div class="btn-checkout">

                                <a <?php if (!empty($_SESSION['cart'])) {
                                        echo "href='checkout.php'";
                                    } else {
                                        echo "popup-open='popup-1' href='javascript:void(0)' ";
                                    } ?>class="btn checkout open-button" name="checkout">Check out</a>

                            </div>
                            <!-- <div class="biolife-progress-bar">
                                <table>
                                    <tr>
                                        <td class="first-position">
                                            <span class="index">JOD 0</span>
                                        </td>
                                        <td class="mid-position">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="last-position">
                                            <span class="index">JOD 99</span>
                                        </td>
                                    </tr>
                                </table>
                            </div> -->
                            <p class="pickup-info"><b>Free Pickup is available. More about shipping and pickup</b> </p>
                        </div>
                    </div>
                </div>
            </div>
<hr>
           
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>