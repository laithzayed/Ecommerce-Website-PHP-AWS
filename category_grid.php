<?php include('includes/connection.php');?>

<?php
 include('includes/headerInner.php');
 // include the Diff class
?>

    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Greener Shop</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
               
                <?php 
                      $query1 = "SELECT * FROM categories WHERE cat_id = {$_GET['cat_id']}";
                      $result1 = mysqli_query($conn,$query1);
                      $row=mysqli_fetch_assoc($result1);
           

               echo "<li class=nav-ite><a class=permal-link> {$row['cat_name']} </a></li> ";
                ?>

                
              
            </ul>
        </nav>
    </div>

    <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

                   

                    <div class="product-category grid-style">

                        <div id="top-functions-area" class="top-functions-area" >
                            <div class="flt-item to-left group-on-mobile">
                               
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <ul class="products-list">

                               <?php
                                        $query  = "select * from products where cat_id ={$_GET['cat_id']}";
                                        $result = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<li class='product-item col-lg-3 col-md-3 col-sm-4 col-xs-6'>";
                                            echo "<div class='contain-product layout-default'>";
                                            echo "<div class='product-thumb'>";
                                            echo "<a href='single_product.php?id={$row['pro_id']}' class='link-to-product'><img src='dashboard/{$row['pro_image']}' alt='dd' width='150' height='150' class='product-thumnail' ></a>"; //>>>>>>>>>>>
                                            echo "</div>";
                                            echo "<div class='info'>";
                                            echo "<b class='categories'>{$row['pro_cat']}</b>"; 
                                            echo "<h4 class='product-title'><a href='#' class='pr-name'>{$row['pro_name']}</a></h4>";
                                            echo "<div class='price'>";


                                            if($row['pro_special_price'] != '0'){
                                                echo " <ins><span class='price-amount'><span class='currencySymbol'>JOD</span>{$row['pro_special_price']}.00</span></ins>
                                                <del><span class='price-amount'><span class='currencySymbol'>JOD</span>{$row['pro_price']}.00</span></del>
                                                ";
                                            
                                            }else{
                                                echo " <ins><span class='price-amount'><span class='currencySymbol'>JOD</span>{$row['pro_price']}.00</span></ins>";
                                            }



                                            // echo "<ins><span class='price-amount'><span class='currencySymbol'>JD</span>{$row['pro_price']}</span></ins>";
                                            // echo "<del><span class='price-amount'><span class='currencySymbol'>JD</span>{$row['pro_special_price']}</span></del>";
                                            echo "</div>";
                                            echo "<div class='slide-down-box'>";
                                            echo " <p class='message'>{$row['pro_short_desc']}</p>";
                                            echo "<div class='buttons'><a href='add_to_cart.php?cart_id={$row['pro_id']}&page=category_grid.php' class='btn add-to-cart-btn'><i class='fa fa-cart-arrow-down' aria-hidden='true'></i>add to cart</a>
                                         </div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</li>";
                                        }
                                        ?>
                            </ul>
                        </div>

                        <div class="biolife-panigations-block">
                            <ul class="panigation-contain">
                            
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

<?php include('includes/footer.php');?>