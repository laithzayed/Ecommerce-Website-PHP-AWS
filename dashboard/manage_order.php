<?php
include('includes/connection.php');

include('includes/check_admin.php');
?>

<?php
include('includes/admin_header.php');


?>



<!-- page content -->
<div class="right_col" role="main">
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
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

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

											<th class="column-title">Order # </th>
											<th class="column-title">User #</th>
                                            <th class="column-title">Order Date </th>
                                            <th class="column-title">Order Country </th>
											<th class="column-title">Order City </th>
                                            <th class="column-title">order Amount</th>
                                            <th class="bulk-actions" colspan="7">
												<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
											</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$query = "SELECT * FROM orders";
										$result = mysqli_query($conn, $query);
										// $row =  mysqli_fetch_assoc($result);
										// print_r($row);
										while ($row =  mysqli_fetch_assoc($result)) {
											echo "<tr>";
											echo "<td>";
											echo "{$row['order_id']}";
											echo "</td>";
											echo "<td>";
											echo "{$row['user_id']}";
                                            echo "</td>";
                                            echo "<td>";
											echo "{$row['order_date']}";
											echo "</td>";
											echo "<td>";
											echo "{$row['order_country']}";
											echo "</td>";
											echo "<td>";
											echo "{$row['order_city']}";
                                            echo "</td>";
                                            echo "<td>";
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
			<!-- /page content -->

			<!-- footer content -->
			<!-- /footer content -->
		</div>
	</div>
</div>
</div>


<?php include('includes/admin_footer.php'); ?>