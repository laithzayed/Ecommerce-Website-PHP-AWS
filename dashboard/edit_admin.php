<?php
include('includes/connection.php');
include('includes/check_admin.php');
// Fetch Old Data 
$query = "SELECT * FROM admins WHERE admin_id = {$_GET['id']}";
$result = mysqli_query($conn, $query);
$row   = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    // Take Data From Web Form 
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $name = $_POST['name'];


    if (!empty($_POST['password'])) {
        $check_admin_password = $password;
    } else {
        $check_admin_password = $row['admin_password'];
    }

    if ($password == $password2) {
        $query = "UPDATE admins set  admin_email    = '$email'
                                ,admin_password = '$check_admin_password'
                                ,admin_name     = '$name'
                                WHERE admin_id  = '{$_GET['id']}'";
        mysqli_query($conn, $query);
        header("location:manage_admin.php");
    } else {
        $error1 = "*passwords dont match";
    }
}

?>

<?php include('includes/admin_header.php');
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Admin Details</h3>
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Edit Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" class="form-control" name="name" value="<?php echo $row['admin_name'] ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">New Email<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="email" id="last-name" required="required" class="form-control" name="email" value="<?php echo $row['admin_email'] ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">New Password</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control" type="password" name="password" placeholder="Old password is :  <?php echo $row['admin_password'] ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Confirm-Password</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control" type="password" name="password2" placeholder="Retype New Password">
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
                                    <button class="btn btn-primary" type="submit" name="submit">
                                        <!-- <i class="fas fa-location-arrow"></i> -->Update
                                    </button>

                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <!-- /footer content -->
        </div>
    </div>
</div>


<?php include('includes/admin_footer.php'); ?>