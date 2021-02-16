<?php
include('includes/connection.php');
include('includes/header.php');



?>

<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="assets/css/main-color02.css" rel="stylesheet" type="text/css" />


<!-- Page Contain -->
<div class="page-contain">

    <!-- Main content -->
    <div id="main-content" class="main-content">

        <!-- Block 01: Main slide block-->
        <div class="main-slide block-slider">
            <ul class="biolife-carousel nav-none-on-mobile" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}'>
                <li>
                    <div class="slide-contain slider-opt03__layout01 mode-02 slide-bgr-01">
                        <div class="media"></div>
                        <div class="text-content">
                            <i class="first-line">Don't miss out on our</i>
                            <h3 class="second-line">NEW ARRIVALS!</h3>
                            <p class="third-line">Shop now GREENER new collection of plants<br>  and pots </p>
                            <p class="buttons">
                                <a href="new_arrivals.php" class="btn btn-bold">Shop now</a>
                                
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="slide-contain slider-opt03__layout01 mode-02 slide-bgr-02">
                        <div class="media"></div>
                        <div class="text-content">
                            <i class="first-line">Holiday season?</i>
                            <h3 class="second-line">ITS SALE TIME</h3>
                            <p class="third-line">Don't miss out on our Holiday Season offers<br> and discounts</p>
                            <p class="buttons">
                                <a href="#on-sale" class="btn btn-bold">Shop now</a>
                               
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="slide-contain slider-opt03__layout01 mode-02 slide-bgr-03">
                        <div class="media"></div>
                        <div class="text-content">
                            <i class="first-line">Care for more</i>
                            <h3 class="second-line">PLANT <br> CARE?</h3>
                            <p class="third-line">Check out our Plant Care Accessories and <br> Guides to nourish your plants now.</p>
                            <p class="buttons">
                                <a href="category_grid.php?cat_id=29" class="btn btn-bold">Shop now</a>
                                
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Block 02: Grid Banners-->
        <div class="biolife-gird-banners xs-margin-top-80px sm-margin-top_-1px">

            <div class="grid-panel">

                <div class="grid-panel-item left-content">
                    <div class="biolife-banner grid biolife-banner__grid">
                        <a href="category_grid.php?cat_id=29" class="media-contain media-01"></a>
                        <div class="banner-contain">
                            <a href="category_grid.php?cat_id=29" class="cat-name">Plants care and accesories</a>
                        </div>
                    </div>
                </div>

                <div class="grid-panel-item midle-content">
                    <ul class="list-media">
                        <li>
                            <div class="biolife-banner grid biolife-banner__grid">
                                <a href="category_grid.php?cat_id=34" class="media-contain media-02"></a>
                                <div class="banner-contain">
                                    <a href="category_grid.php?cat_id=34" class="cat-name">Edible Plants</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-banner grid biolife-banner__grid">
                                <a href="category_grid.php?cat_id=32" class="media-contain media-03"></a>
                                <div class="banner-contain">
                                    <a href="category_grid.php?cat_id=32" class="cat-name">Outdoor Plants</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-banner grid biolife-banner__grid">
                                <a href="category_grid.php?cat_id=31" class="media-contain media-04"></a>
                                <div class="banner-contain">
                                    <a href="category_grid.php?cat_id=31" class="cat-name">Indoor Plants</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="biolife-banner grid biolife-banner__grid">
                                <a href="category_grid.php?cat_id=30" class="media-contain  media-05"></a>
                                <div class="banner-contain">
                                    <a href="category_grid.php?cat_id=30" class="cat-name">Ferns Plants</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="grid-panel-item right-content">
                    <div class="biolife-banner grid biolife-banner__grid">
                        <a href="category_grid.php?cat_id=33" class="media-contain media-06"></a>
                        <div class="banner-contain">
                            <a href="category_grid.php?cat_id=33" class="cat-name">Pots</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <!-- Block 05: Banner Promotion-->
        <div class="banner-promotion xs-margin-top-80px">
            <div class="biolife-banner promotion5 biolife-banner__promotion5">
                <div class="banner-contain">
                    <div class="media">
                        <div class="img-moving position-1">
                            <a href="#" class="banner-link">
                                <img src="assets/images/home-02/bn-promotion5-child1.png" width="938" height="736" alt="img msv">
                            </a>
                        </div>
                        <div class="img-moving position-2">
                            <img src="assets/images/home-02/bn-promotion5-child2.png" width="227" height="548" alt="img msv">
                        </div>
                    </div>
                    <div class="text-content">
                        <i class="text1">GREENER & <br>AIR PURIFIER!</i>
                        <b class="text2">CHOOSE FERNS</b>
                        <p class="buttons">
                            <a href="category_grid.php?cat_id=30" class="btn btn-bold">Shop Now!</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Block 06: Product Tab-->
        <div class="product-tab z-index-20 sm-margin-top-62px xs-margin-top-80px">
            <div class="container">

                <div id="on-sale" class="biolife-title-box biolife-title-box__icon-at-top-style hidden-icon-on-mobile">
               
                   
                    <h3 class="main-title">On Sale Now!</h3>
                    <hr>
                </div>

                <div class="biolife-tab biolife-tab-contain">

                    <div class="tab-content">
                        <div id="tab02_1st" class="tab-contain active">
                            <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>
                                <?php
                                $query = "SELECT * FROM products WHERE pro_special_price != ''";
                                $result = mysqli_query($conn, $query);
                                // $count  = mysqli_num_rows($result);
                                // print_r($count);
                                while ($row =  mysqli_fetch_assoc($result)) {
                                    echo "
                                        <li class='product-item'>
                                        <div class='contain-product layout-default'>
                                            <div class='product-thumb'>
                                                <a href='single_product.php?id={$row['pro_id']}' class='link-to-product'>
                                                    <img src='../dashboard/{$row['pro_image']}' width='270' height='270' class='product-thumnail'>
                                                </a>
                                            </div>
                                            <div class='info'>
                                                <b class='categories'></b>
                                                <h4 class='product-title'><a href='single_product.php?id={$row['pro_id']}' class='pr-name'>{$row['pro_name']}</a></h4>
                                                <div class='price '>
                                                    <ins><span class='price-amount'><span class='currencySymbol'>JD </span>{$row['pro_special_price']}</span></ins>
                                                    <del><span class='price-amount'><span class='currencySymbol'>JD </span>{$row['pro_price']}</span></del>
                                                </div>
                                                <div class='slide-down-box'>
                                                    <div class='buttons'>
                                                       <a href='add_to_cart.php?page=home&cart_id={$row['pro_id']}' class='btn add-to-cart-btn'><i class='fa fa-cart-arrow-down' aria-hidden='true'></i>add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li> ";
                                }

                                ?>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>




        <?php include('includes/footer.php'); ?>