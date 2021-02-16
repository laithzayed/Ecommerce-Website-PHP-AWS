
<?php
include('includes/connection.php');
include('includes/check_admin.php');




if(isset($_POST['submit'])){
   
    $category_name = $_POST['cat_name'];

    $query = "update categories set cat_name = '$category_name'
              where 	cat_id = {$_GET['id']}";
    
    mysqli_query($conn,$query);
    header("location:manage_category.php");
}

// Fetch Old Data 
$query = "select * from categories where 	cat_id = {$_GET['id']}";
$result = mysqli_query($conn,$query);
$row   = mysqli_fetch_assoc($result);



 ?>


 
<?php include('includes/admin_header.php'); ?>

			<!-- page content -->
			
					<div class="right_col" role="main">
						<div class="">
		
				<div class="col-md-12 ">
									<div class="x_panel">
										<div class="x_title">
											<h2>Manage Category</h2>
											<ul class="nav navbar-right panel_toolbox">
												<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
											</ul>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<br />
											<form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
		
												<div class="form-group row ">
													<label class="control-label col-md-3 col-sm-3 ">Category Name</label>
													<div class="col-md-9 col-sm-9 ">
														<input type="text" class="form-control" name="cat_name" placeholder=""  value="<?php echo $row['cat_name']?>" >
													</div>
												</div>
                                    
												<div class="form-group row">
													<label class="control-label col-md-3 col-sm-3 ">Category Image <span class="required"></span>
													</label>
													<div class="col-md-9 col-sm-9 ">
													<input id="cc-pament" name="cat_image" type="file" class="form-control"   value="<?php echo $row['']?>" >
													</div>
												</div>
												
		
												<div class="ln_solid"></div>
												<div class="form-group">
													<div class="col-md-9 col-sm-9  offset-md-3">
														<button type="submit" name="submit" class="btn btn-primary">Update</button>
													</div>
													
												</div>
		
											</form>
										</div>
										
									</div>
									
								</div>
				   
					</div>
					
					</div>
				  </div>
				</div>
				  </div>
				  
				<!-- /page content -->
					

<?php include('includes/admin_footer.php'); ?>























