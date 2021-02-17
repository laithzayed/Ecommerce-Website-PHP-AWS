<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Greener-Plant-Store</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/main-color02.css">
    <?php include 'popup_style.php' ?>
</head>
<body class="biolife-body">

    <!-- Preloader -->
    <div id="biof-loading">
        <div class="biof-loading-center">
            <div class="biof-loading-center-absolute">
                <div class="dot dot-one"></div>
                <div class="dot dot-two"></div>
                <div class="dot dot-three"></div>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-02">
        <div class="header-top bg-main hidden-xs">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>info@greener.com</a></li>
                        <li><a href="#">Free Shipping for all Order of 50JD</a></li>
                    </ul>
                </div>
                <div class="top-bar right">
                    <ul class="social-list">
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="horizontal-menu">
                        <li>
                     
                        <?php
                        if (isset($_SESSION['user_id']) ) {

                            echo ' 
                            <li>
                               <div class="dropdown">
                               <button class="btn btn-link dropdown-toggle" style="text-decoration:none; color:#789763; padding-top:10px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 My Account
                               </button>
                               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                 <a class="dropdown-item" href="user_account.php" style="padding-left:10px">View Account</a><br>
                                 <a class="dropdown-item" href="logout.php" style="padding-left:10px">Logout</a>
                                </div>
                             </div>

                             </li>  
                        ';


                        }else{
                            echo "  <a href=login.php class=login-link><i class=biolife-icon icon-login></i>Login/Register</a>
                            ";

                        }


                         ?>
        </li>
        <li class="item-link"><a href="javascript:void(0)" value="search_results.php" class="dsktp-open-searchbox"><i class="biolife-icon icon-search"></i></a></li>


                    </ul>
                </div>
            </div>
        </div>
        <div class="header-middle biolife-sticky-object ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 hidden-sm hidden-xs">
                        <div class="primary-menu">
                            <ul class="menu biolife-menu clone-main-menu clone-primary-menu">
                                <li class="menu-item"><a href="index.php">Home</a></li>
                                <li class="menu-item menu-item menu-item-has-children has-megamenu">
                                    <a href="all_products.php" class="menu-name" data-title="Shop">Shop<div class="sup-item"><span class="lbl new">New</span></div></a>
                                    <div class="wrap-megamenu lg-width-400 md-width-400">
                                        <div class="mega-content">
                                            <div class="col-lg-12 col-md-12 md-margin-bottom-0 xs-margin-bottom-46px">
                                                <div class="wrap-custom-menu vertical-menu">
                                                    <div class="top-banner-menu">
                                                       
                                                    </div>

                                                    <?php
                                        $query  = "select * from categories";
                                        $result = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($result)){

                                            echo "
                                            <h4 class='menu-title' ><a href='category_grid.php?cat_id={$row['cat_id']}' style='text-decoration:none; color:#789763'>{$row['cat_name']}</a></h4>
                                                   
                                                   </div>
                                               </div>
                                               <div class='col-lg-12 col-md-12 md-margin-bottom-0 xs-margin-bottom-46px'>
                                                   <div class='wrap-custom-menu vertical-menu'>
                                                       <div class='top-banner-menu'>
                                                          
                                                       </div>
                                            ";
                                       
                                        }
                                        ?>








                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item"><a href="about-us.php">About Us</a></li>
                                
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <a href="index.php" class="biolife-logo"><img src="assets/images/3.png" alt="Greener" width="135" height="34"></a>
                    </div>
                    <div class="col-lg-5 col-md-4 col-sm-6 col-xs-6">
                        <div class="biolife-cart-info">
                            <div class="mobile-search">
                                <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                                <div class="mobile-search-content">
                                    <form action="search_results.php" class="form-search" name="mobile-seacrh" method="get">
                                        <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                        <input type="text" name="query" class="input-text" value="" placeholder="Search here...">
                                        <select name="category">
                                            <option value="-1" selected>Greener Search</option>
                                   
                                        </select>
                                        <button type="submit" class="btn-submit">go</button>
                                    </form>
                                </div>
                            </div>
                            <div class="login-item">
                                                          
                            </div>
                            
                            <div class="minicart-block">
                                <div class="minicart-contain">
                                    <a href="javascript:void(0)" class="link-to">
                                            <span class="icon-qty-combine">
                                                <i class="icon-cart-mini biolife-icon"></i>
                                       
                                            </span>
                                        <a href="cart.php"><span class="title">My Cart </span>
                                        <span class="sub-total">
                                        <?php 
                                            
                                            if (isset($_SESSION['total'])){
                                                
                                                echo "<ins>-JOD {$_SESSION['total']} </ins>";  
                                            }
                                            
                                            ?> 
                                        </span>
                                    </a></a>
                                    <div class="cart-content">
                                        <div class="cart-inner">
                                            <ul class="products">
                                            <?php
                                                if (isset($_SESSION["cart"])) {
                                                    $items = $_SESSION["cart"];
                                                    foreach ($items as $key => $value) {
                                                        if ($value['product_special_price'] != '') {
                                                            $price = $value['product_special_price'];
                                                        } else {
                                                            $price = $value['product_price'];
                                                        }
                                                        $old_qty = $value['product_qty'];
                                                        $product_total =  $price * $old_qty;
                                                        //  else {
                                                        //   $product_total =  $price;
                                                        // }
                                                        $total += $product_total;
                                                        echo "
                                                <li>
                                                    <div class='minicart-item'>
                                                        <div class='thumb'>
                                                            <a href='cart.php'><img src='dashboard/{$value['product_image']}' width='90' height='90' alt='image' /></a>
                                                        </div>
                                                        <div class='left-info'>
                                                            <div class='product-title'>
                                                                <a href='cart.php' class='product-name'>{$value['product_name']}</a>
                                                            </div>
                                                            <div class='price'>
                                                                <ins><span class='price-amount'><span class='currencySymbol'>JOD </span>{$value['product_special_price']}</span></ins>
                                                                <del><span class='price-amount'><span class='currencySymbol'>JOD </span>{$value['product_price']}</span></del>
                                                            </div>
                                                            <div class='qty'>
                                                                <label for='cart[id123][qty]'>Qty:</label>
                                                                <input
                                                                type='number'
                                                                class='input-qty'
                                                                name='cart[id123][qty]'
                                                                id='cart[id123][qty]'
                                                                value='{$value['product_qty']}'
                                                                disabled
                                                                />
                                                            </div>
                                                        </div>

                                                        <div class='action'>
                                                        <a href='delete_cart_item.php?key=$key&page=home'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                                                        
                                                    </div>
        


                                                    </div>
                                                </li>";
                                                    }
                                                
                                                
                                                }

                                                $cart_total = $total;
                                    $_SESSION['total'] = $cart_total;

                                                ?>   


                                            </ul>
                                            <p class="btn-control">
                                                <a href="cart.php" class="btn view-cart" style="background-color:#789763">view cart</a>
                                                <a href="checkout.php" class="btn">checkout</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-menu-toggle">
                                <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>