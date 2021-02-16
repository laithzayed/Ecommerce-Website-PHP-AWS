<?php 

include('includes/connection.php');?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Greener-Plant-Store</title>
     <!-- Favicon -->
     <link href="img/favicon.ico" rel="icon">

     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  
     <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
    

<!-- Google Fonts -->
<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet"> -->

<!-- CSS Libraries -->
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="lib/slick/slick.css" rel="stylesheet">
<link href="lib/slick/slick-theme.css" rel="stylesheet"> -->

<!-- Template Stylesheet -->
<!-- <link href="includes/style.css" rel="stylesheet"> -->


    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
    
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/main-color.css">
    <?php include 'popup_style.php' ?>

    <script type="text/javascript">
    function goToNewPage()
    {
        var url = document.getElementById('list').value;
        if(url != 'none') {
            window.location = url;
        }
    }
</script>



       
</head>
<style>
.biolife-body {

    color: #353535;
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
    background: #ffffff;
}
.fade {
    opacity: 100%;}

a {
    color: #789763;
}

a:hover,
a:active,
a:focus {
    color: #353535;
    outline: none;
    text-decoration: none;
}

h1 {
    font-family: 'Source Code Pro', monospace;
    font-weight: 900;
}

h2 {
    font-family: 'Source Code Pro', monospace;
    font-weight: 700;
}

@media(min-width: 992px) {
    .container-fluid {
        padding-right: 60px;
        padding-left: 60px;
    }
}

    /**********************************/
/********* My Account CSS *********/
/**********************************/
.my-account {
    position: relative;
    padding: 30px 0;
}

.my-account .nav.nav-pills .nav-link {
    padding: 10px 15px;
    color: #353535;
    background: #ffffff;
    border-radius: 0;
    border-bottom: 1px solid #dddddd;
    transition: all .3s;
}

.my-account .nav.nav-pills .nav-link:last-child {
    border-bottom: none;
}

.my-account .nav.nav-pills .nav-link:hover,
.my-account .nav.nav-pills .nav-link.active {
    color: #ffffff;
    background: #789763;
}

.my-account .nav.nav-pills .nav-link i {
    margin-right: 5px;
}

.my-account .tab-content {
    padding: 30px;
    background: #ffffff;
}

.my-account .tab-content .table {
    width: 100%;
    text-align: center;
    margin-bottom: 0;
}

.my-account .tab-content .table .thead-dark th {
    text-align: center;
    color: #353535;
    background: #ffffff;
    border-color: #dddddd;
    border-bottom: none;
    vertical-align: middle;
}

.my-account .tab-content .table td {
    vertical-align: middle;
}


    </style>
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
                        <li><a href="#">Free Shipping for all Order of 50JOD</a></li>
                    </ul>
                </div>
                <div class="top-bar right">
                    <ul class="social-list">
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="horizontal-menu">
                  
                   
                        <?php
                        if (isset($_SESSION['user_id']) ) {

                            echo ' 
                                <li>
                                   <div class="dropdown">
                                   <button class="btn btn-link dropdown-toggle" style="text-decoration:none; color:white; padding-top:10px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     My Account
                                   </button>
                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="text-decoration:none; color:#789763; padding-top:10px">
                                    <a class="dropdown-item" href="user_account.php" style="text-decoration:none; color:#789763; padding-top:10px">View Account</a>
                                     <a class="dropdown-item" href="logout.php" style="text-decoration:none; color:#789763; padding-top:10px">Logout</a>
                                    </div>
                                 </div>

                                 </li>  
                            ';

                        }else{
                            echo " <li><a href=login.php class=login-link><i class=biolife-icon icon-login></i>Login/Register</a></li> ";

                        }


                         ?>
                        <!-- <li><a href="login.php" class="login-link"><i class="biolife-icon icon-login"></i>Login/Register</a></li> -->
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
                                    <form action="search_results.php" class="form-search" name="mobile-seacrh" method="get">
                                        <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                        <input type="text" name="query" class="input-text" value="" placeholder="Search here...">
                                        <select name="category">
                                            <option value="-1" selected>All Categories</option>
                                            <option value="plant_care">Plants Care and Accessories</option>
                                            <option value="indoor">Indoor Plants</option>
                                            <option value="outdoor">Outdoor Plants</option>
                                            <option value="edible">Edible Plants</option>
                                            <option value="ferms">Ferms Plants</option>
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
                                                            <a href='cart.php'><img src='../dashboard/{$value['product_image']}' width='90' height='90' alt='image' /></a>
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
                                                <a href="#" class="btn view-cart">view cart</a>
                                                <a href="#" class="btn">checkout</a>
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
                            <form action="#" class="form-search" name="desktop-seacrh" method="get">
                                <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                                <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                            </form>
                        </div>
                        <div class="live-info">
                            <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">(+900) 123 456 7891</b></p>
                            <p class="working-time">Mon-Fri: 8:30am-7:30pm; Sat-Sun: 9:30am-4:30pm</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

