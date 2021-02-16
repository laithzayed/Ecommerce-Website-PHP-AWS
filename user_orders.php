
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
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="horizontal">
                <a class="nav-link " id="dashboard-nav"  href="user_account.php" role="tab"><i class="fa fa-tachometer-alt"></i>Welcome</a>
                    <a class="nav-link active" id="orders-nav" data-toggle="pill" href="#" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                    <a class="nav-link" id="account-nav" href="user_account_details.php" role="tab"><i class="fa fa-user"></i>Account Details</a>
                </div>
            </div>
               
            <div class="col-lg-9">
                
         
                    <!-- <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav"> -->
                        <div class="table-responsive">
                            <table class="table table-bordered" >
                                <thead class="" style="background-color:#f5f5f5; padding-bottom:50px">
                                    <tr>
                                        <th >Order ID</th>
                                        <th>Date</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Total Amount</th>
                                     </tr>
                                </thead>
                                <tbody>
                                <?php
                             

										$query = "SELECT * FROM orders WHERE user_id='{$_SESSION['user_id']}';";
										$result = mysqli_query($conn, $query);
										// $row =  mysqli_fetch_assoc($result);
										// print_r($row);
										while ($row =  mysqli_fetch_assoc($result)) {
											echo "<tr>";
											echo "<td style='background-color:#f5f5f5'>";
											echo "{$row['order_id']}";
											echo "</td>";
										    echo "<td >";
											echo "{$row['order_date']}";
											echo "</td >";
											echo "<td style='background-color:#f5f5f5'>";
											echo "{$row['order_country']}";
											echo "</td>";
											echo "<td >";
											echo "{$row['order_city']}";
                                            echo "</td>";
                                            echo "<td style='background-color:#f5f5f5'>";
											echo "JOD {$row['order_amount']}";
											echo "</td>";
										
											echo "</tr>";
										}
										?>
                                </tbody>
                            </table>
                        </div>
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