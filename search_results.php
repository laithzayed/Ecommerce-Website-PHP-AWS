<?php include('includes/connection.php');?>

<?php

 include('includes/headerInner.php');


?>
    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Organic Fruits</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="#" class="permal-link">Search Results</a></li>
               
            </ul>
        </nav>
    </div>

    <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

                   <!--filtering start-->

                    <div class="product-category grid-style">

                        <div id="top-functions-area" class="top-functions-area" >
                            <div class="flt-item to-left group-on-mobile">
                                
                                </div>
                            </div>
                        </div>
 <!--filtering end-->
  <!--grid start-->
                        <div class="row">
                        <?php
                         $query = $_GET['query']; 
    
                         // gets value sent over search form
                         
                         $min_length = 3;
                         // you can set minimum length of the query if you want
                         
                         if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
                             
                             $query = htmlspecialchars($query); 
                             // changes characters used in html to their equivalents, for example: < to &gt;
                             
                             $query = mysqli_real_escape_string($conn,$query);
                             // makes sure nobody uses SQL injection
                             $searchTerms = explode(' ', $query);
                             $searchTermBits = array();
                             foreach ($searchTerms as $term) {
                                 $term = trim($term);
                                 if (!empty($term)) {
                                     $raw_results = "SELECT * FROM products 
                                  WHERE (`pro_short_desc` LIKE '%$term%') OR (`pro_name`  LIKE '%$term%')  OR (`pro_cat`  LIKE '%$term%')" or die(mysqli_error());
                                    
                                 }
                             }
                             $res = mysqli_query($conn, $raw_results);
        if(mysqli_num_rows($res) > 0){
          
			
			while($results = mysqli_fetch_array($res)){

            echo "
                 
            <ul class='products-list'>

                <li class='product-item col-lg-3 col-md-3 col-sm-4 col-xs-6'>
                    <div class='contain-product layout-default'>
                        <div class='product-thumb'>
                            <a href='single_product.php?id={$results['pro_id']}' class='link-to-product'>
                                <img src='dashboard/{$results['pro_image']}' alt='dd' width='270' height='270' class='product-thumnail'>
                            </a>
                        </div>
                        <div class='info'>
                            <b class='categories'>{$results['pro_cat']}</b>
                            <h4 class='product-title'><a href='single_product.php?id={$results['pro_id']}' class='pr-name'>{$results['pro_name']}</a></h4>
                            <div class='price'>";
                            if($results['pro_special_price'] != '0'){
                                echo " <ins><span class='price-amount'><span class='currencySymbol'>JOD</span>{$results['pro_special_price']}.00</span></ins>
                                <del><span class='price-amount'><span class='currencySymbol'>JOD</span>{$results['pro_price']}.00</span></del>
                                ";
                               
                            }else{
                                echo " <ins><span class='price-amount'><span class='currencySymbol'>JOD</span>{$results['pro_price']}.00</span></ins>";
                            }
                                
                                echo "
                            </div>
                            
                            <div class='slide-down-box'>
                            
                                <div class='buttons'>
                                   
                                    <a href='#' class='btn add-to-cart-btn'><i class='fa fa-cart-arrow-down' aria-hidden='true'></i>add to cart</a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </li>


            </ul>";

            }}}
                             

                       
                        ?>

                        

                    </div>

                </div>

            </div>
        </div>
    </div>

<?php include('includes/footer.php');?>