<?php include('includes/connection.php');?>

<?php
 include('includes/headerInner.php');
?>

    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Greener Shop</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index.php" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="#" class="permal-link">All Products</a></li>
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
<!--grid start-->
                        <div class="row">
                        <?php
                        
                        //  $query = "select * from products";
                        //  $result = mysqli_query($conn,$query);
                        $results_per_page = 12;
                        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
                       $start_from = ($page-1) * $results_per_page;
                       $sql = "SELECT * FROM products ORDER BY pro_id ASC LIMIT $start_from, ".$results_per_page;
                       $rs_result = mysqli_query($conn,$sql); 
                         while($row= $rs_result->fetch_assoc()){
                        echo "
                 
                        <ul class='products-list'>

                            <li class='product-item col-lg-3 col-md-3 col-sm-4 col-xs-6'>
                                <div class='contain-product layout-default'>
                                    <div class='product-thumb'>
                                        <a href='single_product.php?id={$row['pro_id']}' class='link-to-product'>"?>
                                        <?php 
                                        if ( $row['pro_date'] > '2020-12-02 13:42:45' AND $row['pro_date'] < '2020-12-02 16:00:45' ){
                                            echo "<span class=badge badge-pill badge-danger style=background-color:#ff9702 !important;>NEW!</span>";
                                        }else{
                                           echo " <span class=badge badge-pill badge-danger style='visibility:hidden; color:transparent' >NEW</span>";
                                        }
                                        ?>
                                        <?php echo "
                                            <img src='../dashboard/{$row['pro_image']}' alt='dd' width='270' height='270' class='product-thumnail'>
                                            
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
                                        <a href='add_to_cart.php?cart_id={$row['pro_id']}' class='btn add-to-cart-btn'><i class='fa fa-cart-arrow-down' aria-hidden='true'></i>add to cart</a>
                                     </div>
                                        </div>
                                    </div>
                                </div>
                            </li>


                        </ul>";}
                       
                        ?>

                        <div class="biolife-panigations-block">
                            <ul class="panigation-contain">
                                <?php
                                $sql = "SELECT COUNT(pro_id) AS total FROM products"; 
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $total_pages = ceil($row["total"] / $results_per_page);
                                for ($i=1; $i<= ($total_pages - 1); $i++) { 
                                    echo "   <li><a name=pnum  href='all_products.php?page=".$i."'";
                                        if ($i==$page) { 
                                        echo " class='current-page'";}
                                        echo ">".$i."</a></li> ";  
                                ;}
                                ?>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

<?php include('includes/footer.php');?>