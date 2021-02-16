<?php
ob_start();
include('includes/connection.php'); ?>

<?php
include('includes/headerInner.php');
?>
<?php
if (isset($_POST['submit'])) {
    $user_email    = $_POST['user_email'];
    $user_password = $_POST['user_password'];


    if (!empty($user_email) && !empty($user_password)) {
        $query = "select * from users where user_email = '$user_email' AND 
                  user_password = '$user_password'";
        $result = mysqli_query($conn, $query);
        $row    = mysqli_fetch_assoc($result);
        if ($row) {
            $_SESSION['user_id'] = $row['user_id'];
            if ($_GET['page'] == 'checkout') {
                header("location:checkout.php");
            } else {
                header("location:user_account.php");
            }
        } else {
            $error = "User not Found";
        }
    } else {
        $error =  "username / password Required";
    }
}

?>


<!--Hero Section-->
<div class="hero-section hero-background">
    <h1 class="page-title">Sign In</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">Authentication</span></li>
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
                        <form action="#" name="frm-login" method="post">
                            <p class="form-row">
                                <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                <input type="text" id="fid-name" name="user_email" value="" class="txt-input" required>
                            </p>
                            <p class="form-row">
                                <label for="fid-pass">Password:<span class="requite">*</span></label>
                                <input type="password" id="fid-pass" name="user_password" value="" class="txt-input" required>
                            </p>
                            <p class="form-row wrap-btn">
                                <button class="btn btn-submit btn-bold" name="submit" type="submit">sign in</button>
                                <a href="#" class="link-to-help">Forgot your password</a>
                            </p>
                        </form>
                    </div>
                </div>

                <!--Go to Register form-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="register-in-container">
                        <div class="intro">
                            <h4 class="box-title">New Customer?</h4>
                            <p class="sub-title">Create an account with us and you’ll be able to:</p>
                            <ul class="lis">
                                <li>Check out faster</li>
                                <li>Save multiple shipping anddesses</li>
                                <li>Access your order history</li>
                                <li>Track new orders</li>
                                <li>Save items to your Wishlist</li>
                            </ul>
                            <a href="create-account.php" class="btn btn-bold">Create an account</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>


<?php include('includes/footer.php'); ?>