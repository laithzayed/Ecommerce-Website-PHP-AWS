<?php
include('includes/connection.php');
include('includes/check_admin.php');
?>

<?php

if(isset($_POST['submit'])){


    $image_name = $_FILES['cat_image']['name'];
    $tmp_name   = $_FILES['cat_image']['tmp_name'];
    $path       = 'admin_images/manage_category/';


    move_uploaded_file($tmp_name,$path.$image_name);




    $category_name = $_POST['cat_name'];

    $query = "insert into categories(cat_name,cat_image)
			  values('$category_name','$path$image_name')";




    mysqli_query($conn,$query);
}




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
                                <input type="text" class="form-control" required="required" name="cat_name" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Category Image <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="cc-pament" name="cat_image" type="file" class="">
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



    <div class="" role="main">
        <div class="">

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

                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">Category ID</th>
                                <th class="column-title">Category Name</th>
                                <th class="column-title">Category Description</th>
                                <th class="column-title no-link last"><span class="nobr">Edit</span>
                                <th class="column-title no-link last"><span class="nobr">Delete</span>
                            </thead>
                            </th>
                            <?php
                            $query  = "select * from categories";
                            $result = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>{$row['cat_id']}</td>";
                                echo "<td>{$row['cat_name']}</td>";
                                echo "<td><img src='{$row['cat_image']}' width='100' height='100'></td>";
                                echo "<td><a href='category_edit.php?id={$row['cat_id']}' class='btn btn-warning'>Edit</a></td>";
                                echo "<td><a href='category_delete.php?id={$row['cat_id']}' class='btn btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>  </div>

                <!-- /page content -->


                <?php include('includes/admin_footer.php'); ?>
            </div></div>