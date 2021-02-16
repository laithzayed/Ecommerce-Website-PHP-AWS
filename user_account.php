
<?php 
ob_start();


?>

<?php
include('includes/headerinner2.php');

?>


<?php

// Fetch Old Data 
$query = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $query);
$row   = mysqli_fetch_assoc($result);


if (isset($_POST['submit'])) {
    // Take Data From Web Form 
    $firstname = $_POST['user_firstname'];
    $lastname = $_POST['user_lastname'];
    $phone = $_POST['user_phone'];
    $email    = $_POST['user_email'];
    $password = $_POST['user_password'];
    $password2 = $_POST['user_password2'];
    $address1 = $_POST['user_address1'];
    $address2 = $_POST['user_address2'];
    $country = $_POST['user_country'];
    $city = $_POST['user_city'];
    $zipcode = $_POST['user_zip_code'];



    if (!empty($_POST['user_password'])) {
        $check_user_password = $password;
    } else {
        $check_user_password = $row['user_password'];
    }

    if ($password == $password2) {
        $query2 = "UPDATE users set  user_email    = '$email'
                                ,user_password = '$check_user_password'
                                ,user_firstname    = '$firstname'
                                ,user_lastname     = '$lastname'
                                ,user_phone        = '$phone'
                                ,user_address1     = '$address1'
                                ,user_address2     = '$address2'
                                ,user_country      = '$country'
                                ,user_city         = '$city'
                                ,user_zip_code     = '$zipcode'
                                WHERE user_id  = '{$_SESSION['user_id']}'";
        mysqli_query($conn, $query2);
        header("location:user_account.php");
    } else {
        $error1 = "*passwords dont match";
    }
}


?>



<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">My Account</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- My Account Start -->
<div class="my-account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="dashboard-nav"  href="user_account.php" role="tab"><i class="fa fa-tachometer"></i>Welcome</a>
                    <a class="nav-link" id="orders-nav"  href="user_orders.php" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                    <a class="nav-link" id="account-nav" href="user_account_details.php" role="tab"><i class="fa fa-user"></i>Account Details</a>
                </div>
            </div>
               
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                        <h4><?php echo " <h3 style='color:#789763'>Welcome {$row['user_firstname']}</h3>" ?></h4>
                        <p>
                            Thanks you for shopping with us , feel free to edit your profile
                            <br>
                            <p>Greeners team wish a great day for you!</p>
                        </p>
                    </div>
      
                </div>

            </div>
        </div>
    </div>
</div>
<!-- My Account End -->



<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/slick/slick.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>

<?php include('includes/footer.php'); ?>