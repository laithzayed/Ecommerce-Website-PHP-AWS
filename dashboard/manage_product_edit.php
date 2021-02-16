<?php
include('includes/connection.php');
include('includes/check_admin.php');
?>
 
<?php include('includes/admin_header.php'); 
// Fetch Old Data 
$query = "select * from products where pro_id = {$_GET['id']}";
$result = mysqli_query($conn,$query);
$row   = mysqli_fetch_assoc($result);
// make the action when user click on Save Button
if(isset($_POST['submit'])){
    $pro_name = $_POST['pro_name'];
    $pro_cat = $_POST['pro_cat'];
    $pro_short_desc = $_POST['pro_short_desc'];
    $pro_long_desc = $_POST['pro_long_desc'];
    $pro_price = $_POST['pro_price'];
    $pro_special_price = $_POST['pro_special_price'];
    
	// get image data
	$image_name = $_FILES['pro_image']['name'];
	$tmp_name   = $_FILES['pro_image']['tmp_name'];
	$path       = 'admin_images/manage_product/';
	
	// move image to folder
	move_uploaded_file($tmp_name,$path.$image_name);

	

	if ($image_name) {
		$check_img = $path . $image_name;
	} else {
		$check_img = $row['pro_image'];
	}



    $query = "update products set   pro_name            = '$pro_name',
                                    pro_cat             = '$pro_cat',
                                    pro_short_desc      = '$pro_short_desc',
                                    pro_long_desc      = '$pro_long_desc',
                                    pro_price           ='$pro_price',
                                    pro_special_price   ='$pro_special_price',
                                    pro_image           ='$check_img'
                                    
                               
              where pro_id = {$_GET['id']}";
    
    mysqli_query($conn,$query);
    header("location:manage_product.php");
}


// if(isset($_POST['submit'])){
// if ($image_name) {
// 	$check_img = $path . $image_name;
// } else {
// 	$check_img = $row['pro_image'];
// }
// $query = "UPDATE products set   product_image = '$check_img'
// 								WHERE product_id = {$_GET['id']}";
// mysqli_query($connection, $query);}


?>
<!-- page content -->
<div class="right_col" role="main">
				<div class="">
					
					<div class="col-md-12 ">
						<div class="x_panel">
							<div class="x_title">
								<h2>Update Product</h2>
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
										
											<input type="text" name="pro_name" class="form-control" placeholder="" value=" <?php echo $row['pro_name'];?>" >
											
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

											<input class="form-control" name="pro_short_desc" rows="3"  value=" <?php echo $row['pro_short_desc'];?>"></input>
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 ">Product long Description <span class="required"></span>
										</label>
										<div class="col-md-9 col-sm-9 ">
											<input class="form-control" name="pro_long_desc" rows="3" value=" <?php echo $row['pro_long_desc'];?>"></input>
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 ">Product Price</label>
										<div class="col-md-9 col-sm-9 ">
											<input type="text" name="pro_price" class="form-control" value=" <?php echo $row['pro_price'];?>" >
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-md-3 col-sm-3 ">Product Special Price</label>
										<div class="col-md-9 col-sm-9 ">
											<input type="text" name="pro_special_price" class="form-control" value=" <?php echo $row['pro_special_price'];?>">
										</div>
									</div>
									
									
									<div class="row form-group">
									<div class="col col-md-3">
									<label for="file-input" class=" form-control-label">Product current Image</label>
									</div>
									<div class="col-12 col-md-9">
									
									<?php
									echo "<img src='{$row['pro_image']}' width='120' height='200'><br>";
									
                                    ?>
									
									<br>
									</div>
									<div class="col col-md-3">
									<label for="file-input" class=" form-control-label">Change Image</label>
									</div>
									<div class="col-12 col-md-9">
									<input type="file" id="file-input" name="pro_image" class="form-control-file">
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
										
												
											
        

        <?php include('includes/admin_footer.php'); ?>
