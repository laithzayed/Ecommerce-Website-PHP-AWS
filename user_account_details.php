
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
                    <a class="nav-link " id="dashboard-nav"  href="user_account.php" role="tab"><i class="fa fa-tachometer-alt"></i>Welcome</a>
                    <a class="nav-link" id="orders-nav" href="user_orders.php" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                    <a class="nav-link active" id="account-nav" data-toggle="pill" href="#" role="tab"><i class="fa fa-user"></i>Account Details</a>
                </div>
            </div>
               
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane " id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                        <h4><?php echo " <h3 style='color:#789763'><ins>Welcome {$row['user_firstname']}</ins></h3>" ?></h4>
                        <p>
                            Thanks you for shopping with us , feel free to edit your profile
                            <br>
                            <h3>Greeners team wish a great day for you!</h3>
                            <hr>
                        </p>
                    </div>
                   
                
                    <form action="" method="post">
                    <!-- <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav"> -->
                        <h4>Account Details</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="First_Name" name="user_firstname" value="<?php echo $row['user_firstname'] ?>"><br>
                            </div>
                            <div class="col-md-6">
                            <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Last_Name" name="user_lastname" value="<?php echo $row['user_lastname'] ?>"><br>
                            </div>
                            <div class="col-md-6">
                            <label>Phone</label>
                                <input class="form-control" type="text" placeholder="Mobile" name="user_phone" value="<?php echo $row['user_phone'] ?>"><br>
                            </div>
                            <div class=" col-md-6">
                            <label>Email</label>
                                <input class="form-control" type="text" placeholder="Email" name="user_email"  value="<?php echo $row['user_email'] ?>"><br>
                            </div>
                            <div class=" col-md-6">
                            <label>Password</label>
                                <input class="form-control" type="text" placeholder="<?php echo $row['user_password'] ?>" name="user_password"  value=""><br>
                            </div>
                            <div class=" col-md-6">
                            <label>Confirm Password</label>
                                <input class="form-control" type="text" placeholder="" name="user_password2"  value=""><br>
                            </div>
                            <div class=" col-md-6">
                            <label>Address 1</label>
                                <input class="form-control" type="text" placeholder="Address" name="user_address1" value="<?php echo $row['user_address1'] ?>"><br>
                            </div>
                            <div class=" col-md-6">
                            <label>Address 2</label>
                                <input class="form-control" type="text" placeholder="Address" name="user_address2" value="<?php echo $row['user_address2'] ?>"><br>
                            </div>
                            <div class=" col-md-4">
                            <label>Country</label>
                                <input class="form-control" type="text" placeholder="Country" name="user_country" value="<?php echo $row['user_country'] ?>"><br>
                            </div>
                            <div class=" col-md-4">
                            <label>City</label>
                                <input class="form-control" type="text" placeholder="City" name="user_city" value="<?php echo $row['user_city'] ?>"><br>
                            </div>
                            <div class=" col-md-4">
                            <label>Zip code</label>
                                <input class="form-control" type="text" placeholder="Zip Code" name="user_zip_code" value="<?php echo $row['user_zip_code'] ?>"><br>
                            </div>
                                           
                            <div class=" col-md-12">
                                <br>
                                <button class="btn btn-danger" type="submit" name="submit">Update Account</button>
                            </div>
                        </div>
                    </div>
</form>
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