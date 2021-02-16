<?php include('../includes/connection.php');?>

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
                <li class="nav-item"><span class="current-page">Registeration</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain login-page">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                        <div class="intro">
                                <h2 class="box-title">Happy to have a new plant parent!</h2>
                                <p class="sub-title">Now let's create a secure account for you</p>
</br>
</br>
                                
                            </div>
                            <form action="#" name="frm-login" method="post" style="align-items:center;">
                            <p class="form-row">
                                    <label for="fid-name">First Name:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="name" value="" class="txt-input">
                               
                                    <label for="fid-name">Last Name:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="name" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="name" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Password:<span class="requite">*</span></label>
                                    <input type="email" id="fid-pass" name="email" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Repeat Password:<span class="requite">*</span></label>
                                    <input type="email" id="fid-pass" name="email" value="" class="txt-input">
                                </p>
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-submit btn-bold" type="submit">Create Account</button>
                                    
                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <img src="assets/images/home-02/bn-promotion5-child1.png" width="938" height="736" alt="img msv">
                    </div>

                </div>

            </div>

        </div>

    </div>

  
    <?php include('includes/footer.php');?>