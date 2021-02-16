
 
<?php 
include('includes/connection.php');

include('includes/check_admin.php');
?>

<?php

include('includes/admin_header.php'); 

if(isset($_POST['submit'])){
    
	// get image data
	$image_name = $_FILES['pro_image']['name'];
	$tmp_name   = $_FILES['pro_image']['tmp_name'];
	$path       = 'admin_images/manage_product/';
	
	// move image to folder
	move_uploaded_file($tmp_name,$path.$image_name);


	// Take Data From Manage Admin Form 
	$pro_name = $_POST['pro_name'];
	$pro_cat = $_POST['pro_cat'];
	// $pro_cat = $_POST['pro_cat'];
	$pro_short_desc = $_POST['pro_short_desc'];
	$pro_long_desc = $_POST['pro_long_desc'];
	$pro_price = $_POST['pro_price'];
	$pro_special_price = $_POST['pro_special_price'];


   //Add products query 
	$query = "insert into products (pro_name,pro_cat,pro_short_desc,pro_long_desc,pro_price,pro_special_price,pro_image)
			  values('$pro_name','$pro_cat','$pro_short_desc','$pro_long_desc', '$pro_price', '$pro_special_price', '$path$image_name')";
   
   $result = mysqli_query($conn, $query);
}
?>


			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					
					<div class="col-md-12 ">
						<div class="x_panel">
							<div class="x_title">
								<h2>Manage Products</h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
									
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<br />
								<form action="" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

									<div class="form-group row ">
										<label class="control-label col-md-3 col-sm-3 ">Product Name</label>
										<div class="col-md-9 col-sm-9 ">
											<input type="text" name="pro_name" class="form-control" placeholder="" required="required">
										</div>
									</div>
									
									<div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 ">Product Category</label>
										<div class="col-md-9 col-sm-9 ">
											<select name="pro_cat" class="form-control">
											<?php 
                                                        
                                                        $query = "select * from categories";
                                                        $result = mysqli_query($conn,$query);
                                                        
                                                        while($options=mysqli_fetch_assoc($result)){
                                                            echo "<option>{$options['cat_name']}</option>"; }
                                                                                                                   
                                                        ?>
												
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 ">Product short Description <span class="required"></span>
										</label>
										<div class="col-md-9 col-sm-9 ">
											<textarea class="form-control" name="pro_short_desc" rows="3" placeholder="" required="required"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 ">Product long Description <span class="required"></span>
										</label>
										<div class="col-md-9 col-sm-9 ">
											<textarea class="form-control" name="pro_long_desc" rows="3" placeholder="" required="required"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 ">Product Price</label>
										<div class="col-md-9 col-sm-9 ">
											<input type="text" name="pro_price" class="form-control" value="" required="required">
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 ">Product Special Price</label>
										<div class="col-md-9 col-sm-9 ">
											<input type="text" name="pro_special_price" class="form-control" value="">
										</div>
									</div>
									
									
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="file-input" class=" form-control-label">Product Image</label>
									</div>
									<div class="col-12 col-md-9">
									<input type="file" id="file-input" name="pro_image" class="form-control-file" required="required">
									</div>
									</div>

									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-9 col-sm-9  offset-md-3">
											<button type="submit" name="submit" class="btn btn-primary">Add</button>
											
										</div>
									</div>

								</form>
							</div>
							
						</div>
						
					</div>
	   
		</div>
		<!--table start-->
		
		  <div class="clearfix"></div>

		  <div class="col-md-12 col-sm-12  ">
			<div class="x_panel">
			  <div class="x_title">
				<h2>Products</h2>
				<ul class="nav navbar-right panel_toolbox">
				  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				  </li>
				</ul>
				<div class="clearfix"></div>
			  </div>

			  <div class="x_content">


				<div class="table-responsive">
				  <table class="table table-striped jambo_table bulk_action">
					<thead>
					  <tr class="headings">
						<th class="column-title">ID</th>
						<th class="column-title">Product Name</th>
						<th class="column-title">Product Description</th>
						<th class="column-title">Price</th>
						<th class="column-title">Product Image</th>
						<th class="column-title">Category </th>
						  <th class="column-title no-link last"><span class="nobr">Edit</span></th>
						<th class="column-title no-link last"><span class="nobr">Delete</span>

						</th>
						<tbody>
						<?php
                                        
                                        $query  = "select * from products";
                                        
                                        $result = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "<td>{$row['pro_id']}</td>";
                                            echo "<td>{$row['pro_name']}</td>";
                                            
                                            echo "<td>{$row['pro_short_desc']}</td>";
                                            echo "<td>{$row['pro_price']}</td>";
                                            
											echo "<td><img src='{$row['pro_image']}' width='100' height='100'></td>";
											echo "<td>{$row['pro_cat']}</td>";
                                            echo "<td><a href='manage_product_edit.php?id={$row['pro_id']}' class='btn btn-warning'>Edit</a></td>";
                                            echo "<td><a href='manage_product_delete.php?id={$row['pro_id']}' class='btn btn-danger'>Delete</a></td>";
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
	  </div>
	  
	<!-- /page content -->

	<!-- footer content -->
	
	<!-- /footer content -->

					
<?php include('includes/admin_footer.php'); ?>