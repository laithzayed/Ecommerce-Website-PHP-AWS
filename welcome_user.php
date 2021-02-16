<?php
include('includes/connection.php');?>

<?php include('includes/header.php'); ?>

<!-- MAIN CONTENT-->
<div class="main-content" style="margin-top:100px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
    <div class="wrapper">
        <h1 style="color:red"><ins>You Signed Successfully!</ins></h1>
    </div><br><br><br><br><br><br> 



<?php

// Fetch Old Data 
$query = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $query);
$row   = mysqli_fetch_assoc($result);
print_r($row);

if (isset($_POST['submit'])) {
    // Take Data From Web Form 
	$email    = $_POST['user_email'];
	$password = $_POST['user_password'];
	$password2 = $_POST['user_password2'];
    $firstname = $_POST['user_firstname'];
    $lastname = $_POST['user_lastname'];


    if (!empty($_POST['user_password'])) {
        $check_user_password = $password;
    } else {
        $check_user_password = $row['user_password'];
    }

    if ($password == $password2) {
        $query = "UPDATE users set  user_email    = '$email'
                                ,user_password = '$check_user_password'
                                ,user_firstname     = '$firstname'
                                ,user_lastname     = '$lastname'
                                WHERE user_id  = '{$_SESSION['user_id']}'";
        mysqli_query($conn, $query);
        header("location:manage_customer.php");
    } else {
        $error1 = "*passwords dont match";
    }
}


?>



<!-- page content -->
<div class="container" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Create Customers</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<ul class="nav navbar-right panel_toolbox">
						

						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="first-name" required="required" class="form-control" name="user_firstname">
								</div>
                            </div>
                            <div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">last Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="first-name" required="required" class="form-control" name="user_lastname">
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="email" id="last-name" required="required" class="form-control" name="user_email">
								</div>
							</div>


							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
								<div class="col-md-6 col-sm-6 ">
									<input id="middle-name" class="form-control" required="required" type="text" name="user_password">
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Confirm-Password</label>
								<div class="col-md-6 col-sm-6 ">
									<input id="middle-name" class="form-control" required="required" type="text" name="user_password2">
								</div>
							</div>
							<?php
							if (isset($error1)) {
								echo "<div class='row'>";
								echo "<div class='col-md-3 col-sm-3'></div>";
								echo "<div class='col-md-4 col-sm-4' style='color:red;font-weight:500'>";
								echo "<p>$error1</p>";
								echo "</div>";
								echo "<div class='col-md-4 col-sm-4'></div>";
								echo "</div>";
							} ?>
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<button class="btn btn-primary" type="submit" name="submit">Create</button>

								</div>
							</div>

						</form>
					</div>

				</div>
				<div class="col-md-12 col-sm-12  ">
					<div class="x_panel">
						<div class="x_title">
							<h2>Customers Table</h2>

							<div class="clearfix"></div>
						</div>

						<div class="x_content">


							<div class="table-responsive">
								<table class="table table-striped jambo_table bulk_action">
									<thead>
										<tr class="headings">

											<th class="column-title">ID </th>
											<th class="column-title">User First Name </th>
                                            <th class="column-title">User Last Name </th>
                                            <th class="column-title">User Email</th>
											<th class="column-title">Edit</th>
											<th class="column-title">Delete</th>
										    </tr>
									</thead>

									<tbody>
										<?php
                                        $query2 = "SELECT * FROM users";
                                        $result2 = mysqli_query($conn, $query2);
                                        // $row =  mysqli_fetch_assoc($result);
										// print_r($row);
										while ($row =  mysqli_fetch_assoc($result2)) {

											echo "<tr>";
											echo "<td>";
											echo "{$row['user_id']}";
											echo "</td>";
											echo "<td>";
											echo "{$row['user_firstname']}";
                                            echo "</td>";
                                            echo "<td>";
											echo "{$row['user_lastname']}";
											echo "</td>";
											echo "<td>";
											echo "{$row['user_email']}";
											echo "</td>";
											echo "<td>";
											echo "<a class='btn btn-warning' href='user_account.php?id={$row['user_id']}'>Edit</a>";
											echo "</td>";
											echo "<td>";
											echo "<a class='btn btn-danger' href='delete_customer.php?id={$row['user_id']}'>Delete</a>";
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
			<!-- /page content -->

			<!-- footer content -->
			<!-- /footer content -->
		</div>
	</div>
</div>
</div>



      
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
                            <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Welcome</a>
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Welcome User</h4>
                                <p>
                                    Thanks you for shopping with us , feel free to edit your profile 
                                    <h1>Plants Team</h1>
                                </p> 
                            </div>
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No.</th>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                                <h4>Payment Method</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                                </p> 
                            </div>
                            <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Account Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="First Name" name="user_firstname" value="<?php echo $row['user_firstname'] ?>"><br>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Last Name" name="user_firstname" value="<?php echo $row['user_firstname'] ?>"><br>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Mobile"><br>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Email"><br>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Address"><br>
                                    </div>
                                    <div class="col-md-12">
                                 
                                    </div>
                                </div>
                                <h4>Password change</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" placeholder="Current Password"><br>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="New Password"><br>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Confirm Password"><br>
                                    </div>
                                    <div class="col-md-12">
                                      
                                    </div>
                                </div>
                                <h4>Address change</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Payment Address"><br>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Shipping Address"><br>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <br>
                                        <button class="btn btn-danger">Update Account</button>
                                    </div>
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
 

               
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End MAIN CONTENT-->

<?php include('includes/footer.php'); ?>


