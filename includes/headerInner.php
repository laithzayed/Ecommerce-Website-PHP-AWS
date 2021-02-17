
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
    <link rel="stylesheet" href="assets/css/main-color.css">
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
    <header id="header" class="header-area style-01 layout-03">
        <div class="header-top bg-main hidden-xs">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true" style="color:white"></i>info@Greener.com</a></li>
                        <li><a href="#">Free Shipping for all Order of 50 JOD</a></li>
                    </ul>
                </div>
                <div class="top-bar right">
                    <ul class="social-list">
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="horizontal-menu">
                
                        <!-- <li><a href="login.php" class="login-link"><i class="biolife-icon icon-login"></i>Login/Register</a></li> -->
                   
                        <?php
                        if (isset($_SESSION['user_id']) ) {

                            echo ' 
                                <li>
                                   <div class="dropdown">
                                   <button class="btn btn-link dropdown-toggle" style="text-decoration:none; color:white; padding-top:10px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     My Account
                                   </button>
                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="text-decoration:none; color:#789763; padding-top:10px; padding-left:10px">
                                    <a class="dropdown-item" href="user_account.php" style="text-decoration:none; color:#789763; padding-top:10px; padding-left:10px">View Account</a><br>
                                     <a class="dropdown-item" href="logout.php" style="text-decoration:none; color:#789763; padding-top:10px; padding-left:10px">Logout</a>
                                    </div>
                                 </div>

                                 </li>  
                            ';

                        }else{
                            echo " <li><a href=login.php class=login-link><i class=biolife-icon icon-login></i>Login/Register</a></li> ";

                        }


                         ?>
                       
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-middle biolife-sticky-object ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                        <a href="index.php" class="biolife-logo"><img src="assets/images/organic-3.png" alt="biolife logo" width="135" height="34"></a>
                    </div>
                    <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                        <div class="primary-menu">
                            <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                                <li class="menu-item"><a href="index.php">Home</a></li>
                                
                                <li class="menu-item"><a href="all_products.php">Shop</a></li>
                                <li class="menu-item"><a href="#">Plants care</a></li>
                                <li class="menu-item"><a href="about-us.php">About Us </a></li>
                             
                                <li class="menu-item"><a href="#">Contact us </a></li>
                                
                                
                                
                                
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                        <div class="biolife-cart-info">
                            <div class="mobile-search">
                                <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                                <div class="mobile-search-content">
                                    <form action="#" class="form-search" name="mobile-seacrh" method="get">
                                        <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                        <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                                        <select name="category">
                                            <option value="-1" selected>All Categories</option>
                                            <option value="plant_care">Plants Care and Accessories</option>
                                            <option value="indoor">Indoor Plants</option>
                                            <option value="outdoor">Outdoor Plants</option>
                                            <option value="edible">Edible Plants</option>
                                            <option value="ferms">Ferns Plants</option>
                                            <option value="pots">Pots</option>
                                        </select>
                                        <button type="submit" class="btn-submit">go</button>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="minicart-block">
                                <div class="minicart-contain">
                                    <a href="javascript:void(0)" class="link-to">
                                            <span class="icon-qty-combine">
                                                <i class="icon-cart-mini biolife-icon"></i>
                                                <?php 
                                                if (isset($_SESSION["cart"])) {
                                               $full_cart =count($_SESSION['cart']);
                                               
                                               
                                               echo  "<span class='qty'>$full_cart </span>";
                                                }
                                               
                                               ?>
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
                                                <a href="cart.php" class="btn view-cart">view cart</a>
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
        <div class="header-bottom hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="vertical-menu vertical-category-block">
                            <div class="block-title">
                                <span class="menu-icon">
                                    <span class="line-1"></span>
                                    <span class="line-2"></span>
                                    <span class="line-3"></span>
                                </span>
                                <span class="menu-title">All Categories</span>
                                <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            </div>
                            <div class="wrap-menu">
                                <ul class="menu clone-main-menu">
                                    <li class="menu-item menu-item-has-children ">
                                        <a href="category_grid.php?cat_id=29" class="menu-name" data-title="Fruit & Nut Gifts"><i class="biolife-icon icon-fruits"></i>Plants Care and Accessories</a>
                                           
                                            <div class="mega-content">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-4 col-sm-12 xs-margin-bottom-25 md-margin-bottom-0">
                                                        
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-12 lg-padding-left-23 xs-margin-bottom-25 md-margin-bottom-0">
                                                        
                                                    </div>
                                                    <div class="col-lg-6 col-md-4 col-sm-12 lg-padding-left-50 xs-margin-bottom-25 md-margin-bottom-0">
                                                        <div class="biolife-products-block max-width-270">
                                                            <ul class="products-list default-product-style biolife-carousel nav-none-after-1k2 nav-center" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":1, "responsive":[{"breakpoint":767, "settings":{ "arrows": false}}]}' >
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 md-margin-top-9">
                                                        <div class="biolife-brand" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </li>
                                    <li class="menu-item menu-item-has-children ">
                                        <a href="category_grid.php?cat_id=31" class="menu-name" data-title="Vegetables"><i class="biolife-icon icon-broccoli-1"></i>Indoor Plants</a>
                                        
                                    </li>
                                    <li class="menu-item menu-item-has-children ">
                                        <a href="category_grid.php?cat_id=32" class="menu-name" data-title="Fresh Berries"><i class="biolife-icon icon-grape"></i>Outdoor Plants</a>
                                       
                                    </li>
                                    <li class="menu-item"><a href="category_grid.php?cat_id=30" class="menu-name" data-title="Ocean Foods"><i class="biolife-icon icon-fish"></i>Ferms Plants</a></li>
                                    <li class="menu-item menu-item-has-children ">
                                        <a href="category_grid.php?cat_id=34" class="menu-name" data-title="Butter & Eggs"><i class="biolife-icon icon-honey"></i>Edible Plants</a>
                                        
                                    <li class="menu-item"><a href="category_grid.php?cat_id=33" class="menu-title"><i class="biolife-icon icon-fast-food"></i>Pots</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 padding-top-2px">
                        <div class="header-search-bar layout-01">
                            <form action="search_results.php" class="form-search" name="desktop-seacrh" method="get">
                                <input type="text" name="query" class="input-text" value="" placeholder="Search here...">
                                <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                            </form>
                        </div>
                        <div class="live-info">
                            <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">(+962) 77 -777 7891</b></p>
                            <p class="working-time">Sun - Thu: 10:00am-6:00pm</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>