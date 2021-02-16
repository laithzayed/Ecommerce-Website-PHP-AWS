<?php
include('includes/connection.php');
include('includes/admin_header.php');


if ($_SESSION['admin_role'] != "superAdmin") {
	header('location:index.php');
}


if (isset($_POST['submit'])) {


	// Take Data From Web Form 
	$email    = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$name = $_POST['name'];

	//check if passwords match

	if ($password == $password2) {
		$query = "INSERT INTO admins (admin_email,admin_password,admin_name)
              values('$email','$password','$name')";
		mysqli_query($conn, $query);
	} else {
		$error1 = "*passwords dont match";
	}
}

?>



<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Create Admin</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="first-name" required="required" class="form-control" name="name">
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="email" id="last-name" required="required" class="form-control" name="email">
								</div>
							</div>


							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
								<div class="col-md-6 col-sm-6 ">
									<input id="middle-name" class="form-control" required="required" type="password" name="password">
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Confirm-Password</label>
								<div class="col-md-6 col-sm-6 ">
									<input id="middle-name" class="form-control" required="required" type="password" name="password2">
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
							<h2>Admins Table</h2>

							<div class="clearfix"></div>
						</div>

						<div class="x_content">


							<div class="table-responsive">
								<table class="table table-striped jambo_table bulk_action">
									<thead>
										<tr class="headings">

											<th class="column-title">ID </th>
											<th class="column-title">Admin Name </th>
											<th class="column-title">Admin Email</th>
											<th class="column-title">Edit</th>
											<th class="column-title">Delete</th>
											<th class="bulk-actions" colspan="7">
												<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
											</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$query = "SELECT * FROM admins WHERE admin_role ='admin'";
										$result = mysqli_query($conn, $query);
										// $row =  mysqli_fetch_assoc($result);
										// print_r($row);
										while ($row =  mysqli_fetch_assoc($result)) {
											echo "<tr>";
											echo "<td>";
											echo "{$row['admin_id']}";
											echo "</td>";
											echo "<td>";
											echo "{$row['admin_name']}";
											echo "</td>";
											echo "<td>";
											echo "{$row['admin_email']}";
											echo "</td>";
											echo "<td>";
											echo "<a class='btn btn-warning' href='edit_admin.php?id={$row['admin_id']}'>Edit</a>";
											echo "</td>";
											echo "<td>";
											echo "<a class='btn btn-danger' href='delete_admin.php?id={$row['admin_id']}'>Delete</a>";
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


<?php include('includes/admin_footer.php'); ?>