<?php include('includes/connection.php');?>

<?php

 include('includes/headerInner.php');
//  if(pro_special_price != '')

?>
    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">New Arrivals</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index.php" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="#" class="permal-link">New arrivals</a></li>
                
            </ul>
        </nav>
    </div>

    <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

                   <!-- filtering start-->

                    <div class="product-category grid-style">

                        <div id="top-functions-area" class="top-functions-area" >
                            <div class="flt-item to-left group-on-mobile">
                                <!-- <span class="flt-title">Refine</span>
                                <a href="#" class="icon-for-mobile">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                                <div class="wrap-selectors">
                                    <form action="#" name="frm-refine" method="get">
                                        <span class="title-for-mobile">Refine Products By</span>
                                        <div data-title="Price:" class="selector-item">
                                            <select name="price" class="selector">
                                                <option value="all">Price</option>
                                                <option value="class-1st">Less than 5$</option>
                                                <option value="class-2nd">$5-10$</option>
                                                <option value="class-3rd">$10-20$</option>
                                                <option value="class-4th">$20-45$</option>
                                                <option value="class-5th">$45-100$</option>
                                                <option value="class-6th">$100-150$</option>
                                                <option value="class-7th">More than 150$</option>
                                            </select>
                                        </div>
                                        <div data-title="Brand:" class="selector-item">
                                            <select name="brad" class="selector">
                                                <option value="all">Top brands</option>
                                                <option value="br2">Brand first</option>
                                                <option value="br3">Brand second</option>
                                                <option value="br4">Brand third</option>
                                                <option value="br5">Brand fourth</option>
                                                <option value="br6">Brand fiveth</option>
                                            </select>
                                        </div>
                                        <div data-title="Avalability:" class="selector-item">
                                            <select name="ability" class="selector">
                                                <option value="all">Availability</option>
                                                <option value="vl2">Availability 1</option>
                                                <option value="vl3">Availability 2</option>
                                                <option value="vl4">Availability 3</option>
                                                <option value="vl5">Availability 4</option>
                                                <option value="vl6">Availability 5</option>
                                            </select>
                                        </div>
                                        <p class="btn-for-mobile"><button type="submit" class="btn-submit">Go</button></p>
                                    </form>
                                </div>
                            </div>
                            <div class="flt-item to-right">
                                <span class="flt-title">Sort</span>
                                <div class="wrap-selectors">
                                    <div class="selector-item orderby-selector">
                                        <select name="orderby" class="orderby" aria-label="Shop order">
                                            <option value="menu_order" selected="selected">Default sorting</option>
                                            <option value="popularity">popularity</option>
                                            <option value="rating">average rating</option>
                                            <option value="date">newness</option>
                                            <option value="price">price: low to high</option>
                                            <option value="price-desc">price: high to low</option>
                                        </select>
                                    </div>
                                    <div class="selector-item viewmode-selector">
                                        <a href="category-grid-left-sidebar.html" class="viewmode grid-mode active"><i class="biolife-icon icon-grid"></i></a>
                                        <a href="category-list-left-sidebar.html" class="viewmode detail-mode"><i class="biolife-icon icon-list"></i></a>
                                    </div>
                                </div> --> 
                            </div>
                        </div>
 <!--filtering end -->
  <!--grid start-->
                        <div class="row">
                        <?php
                      
                        
                       
                       $sql = "SELECT * FROM products WHERE pro_date BETWEEN '2020-12-02 13:42:45' AND '2020-12-02 18:00:45' ";
                       $rs_result = mysqli_query($conn,$sql); 
                         while($row= $rs_result->fetch_assoc()){
                        echo "
                 
                        <ul class='products-list'>

                            <li class='product-item col-lg-3 col-md-3 col-sm-4 col-xs-6'>
                                <div class='contain-product layout-default'>
                                    <div class='product-thumb'>
                                        <a href='single_product.php?id={$row['pro_id']}' class='link-to-product'>
                                        
                                            <img src='../dashboard/{$row['pro_image']}' alt='dd' width='270' height='270' class='product-thumnail'>";?>
                                            <?php echo "<span class=badge badge-pill badge-danger style=background-color:#ff9702 !important;>NEW!</span>";?>
                                           
                                           <?php echo"
                                        </a>
                                    </div>
                                    <div class='info'>
                                        <b class='categories'>{$row['pro_cat']}</b>
                                        <h4 class='product-title'><a href='single_product.php?id={$row['pro_id']}' class='pr-name'>{$row['pro_name']}</a></h4>
                                        <div class='price'>";
                                        if($row['pro_special_price'] != '0'){
                                            echo " <ins><span class='price-amount'><span class='currencySymbol'>JOD</span>{$row['pro_special_price']}.00</span></ins>
                                            <del><span class='price-amount'><span class='currencySymbol'>JOD</span>{$row['pro_price']}.00</span></del>
                                            ";
                                           
                                        }else{
                                            echo " <ins><span class='price-amount'><span class='currencySymbol'>JOD</span>{$row['pro_price']}.00</span></ins>";
                                        }
                                            
                                            echo "
                                        </div>
                                        
                                        <div class='slide-down-box'>
                                        
                                            <div class='buttons'>
                                                <a href='#' class='btn wishlist-btn'><i class='fa fa-heart' aria-hidden='true'></i></a>
                                                <a href='#' class='btn add-to-cart-btn'><i class='fa fa-cart-arrow-down' aria-hidden='true'></i>add to cart</a>
                                                <a href='#' class='btn compare-btn'><i class='fa fa-random' aria-hidden='true'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>


                        </ul>";}
                       
                        ?>

                        </div>
                        <div class="biolife-panigations-block">
                            <ul class="panigation-contain">
                                


                            </ul>
                        </div>
                        
                        

                    </div>

                </div>

            </div>
        </div>
    </div>

<?php include('includes/footer.php');?>