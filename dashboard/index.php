<?php
include "includes/connection.php";
if (isset($_POST['submit'])) {
	//Defining variables
	$email    = $_POST['email'];
	$password = $_POST['password'];

	//Creating query to check admins table for normal user
	$check_normal_admin_query = "SELECT * FROM admins WHERE admin_email    = '{$_POST['email']}'
                                                            AND admin_password = '{$_POST['password']}'
                                                            AND admin_role     = 'admin' ";
	$normal_admin_result = mysqli_query($conn, $check_normal_admin_query);
	$normal_admin_rows = mysqli_fetch_assoc($normal_admin_result);
	//Creating query to check admins table for super user
	$check_super_admin_query = "SELECT * FROM admins WHERE  admin_email    = '{$_POST['email']} '
                                                            AND admin_password = '{$_POST['password']}'
                                                            AND admin_role     = 'superAdmin' ";
	$super_admin_result = mysqli_query($conn, $check_super_admin_query);
	$super_admin_rows = mysqli_fetch_assoc($super_admin_result);

	//Checking that no inputs are empty
	if (empty($_POST['email'])) {
		$error1 = "*Please enter email";
	}
	if (empty($_POST['password'])) {
		$error2 = "*Please enter password";
	}

	if (!empty($_POST['email']) && !empty($_POST['password'])) {

		//Checking normal admin
		if ($normal_admin_rows) {
			$_SESSION['admin_role'] = "admin";
			header("location:manage_product.php");
		}

		//Checking super admin
		elseif ($super_admin_rows) {
			$_SESSION['admin_role'] = "superAdmin";
			header("location:manage_admin.php");
		} else {
			$error3 = "*incorrect email or password";
		}
	}
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V11</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" method="post">
				<img src="images/33.png">
					<span class="login100-form-title p-b-55">
						Admin Login
					</span>
					<?php
					if (isset($error3)) {
						echo "<div class='alert alert-danger' style='width:350px;'>";
						echo $error3;
						echo "</div>";
					}
					?>
					<?php
					if (isset($error1)) {
						echo "<div class='alert alert-danger' style='width:350px;'>";
						echo $error1;
						echo "</div>";
					}
					?>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>
					<?php
					if (isset($error2)) {
						echo "<div class='alert alert-danger' style='width:350px;'>";
						echo $error2;
						echo "</div>";
					}
					?>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<!-- <div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div> -->

					<div class="container-login100-form-btn p-t-25">
						<button type="submit" name="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<!-- 	<div class="text-center w-full p-t-115">
						<span class="txt1">
							Not a member?
						</span>

						<a class="txt1 bo1 hov1" href="#">
							Sign up now
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>