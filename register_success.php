<?php
ob_start();
include('includes/connection.php');?>

<?php
 include('includes/headerInner.php');
?>



    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Thank you for being one <br>of our family right now!</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Registeration</span></li>
                <li class="nav-item"><span class="current-page">Success registration</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain login-page">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                        <div class="intro">
                                 <h1 class="box-title">You have been successfully registered!</h1>
                                 <p class="sub-title">Now you can choose your favorit plant</p><br>
                                 <button onclick="window.location.href='login.php'" class="btn btn-submit btn-bold btn-lg" name ="submit" type="submit" style="padding:15px 50px;">  Login  </button>
</br>
</br>
                                
                            </div>
                          
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <img id="img3" src="assets/images/home-02/pexels-photo-5691900.jpeg" width="600" height="680" alt="img msv">
                    </div>

                </div>

            </div>

        </div>

    </div>

  
    <?php include('includes/footer.php');?>