<?php
// Include config file
include('includes/connection.php');?>


 
 <?php

session_start();
if(isset($_POST['submit'])){
    $user_email    = $_POST['user_email'];
    $user_password = $_POST['user_password'];


    if(!empty($user_email) && !empty($user_password)){
        $query = "select * from users where user_email = '$user_email' AND 
                  user_password = '$user_password'";
        $result = mysqli_query($conn,$query);
        $row    = mysqli_fetch_assoc($result);
        if($row){
            $_SESSION['id'] = $row['user_id'];
            header("location:welcome_user.php");
        }else{
            $error = "User not Found";
        }
    }else{
        $error =  "username / password Required";
    }

}

?>
<?php
include('includes/header.php');?>

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
    <div class="wrapper">
        <h2>Login User</h2>
        <p>Please fill this form to sing in to your account.</p>
        <form action="" method="post">
            <div>
                <label>Email</label>
                <input type="text" name="user_email" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="user_password" class="form-control" value="">
                <span class="help-block"></span>
            </div>
           
            <div class="form-group">
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                    <span id="payment-button-amount">Login</span>                
                                </button>
              
            </div>
            <p>Register Now less than 30 seconeds! <a href="register_user.php">Register Now</a>.</p>
        </form>

         <!-- DATA TABLE-->
         <div class="container">
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query  = "select * from users";
                            $result = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>{$row['user_id']}</td>";
                                echo "<td>{$row['user_email']}</td>";
                                echo "<td>{$row['user_password']}</td>";
                                echo "<td><a href='edit_users.php?id={$row['user_id']}' class='btn btn-primary'>Edit</a></td>";
                                echo "<td><a href='delete_users.php?id={$row['user_id']}' class='btn btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }
                             ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->

             <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <form action="" name="register_users" method="post">
                                <p class="form-row">
                                    <label for="fid-name">username:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="username" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">phone:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="phone" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Password:<span class="requite">*</span></label>
                                    <input type="email" id="fid-pass" name="password" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Confirm Password:<span class="requite">*</span></label>
                                    <input type="email" id="fid-pass" name="*password2" value="" class="txt-input">
                                </p>
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-submit btn-bold" type="submit">sign in</button>
                                    <a href="#" class="link-to-help">Forgot your password</a>
                                </p>
                            </form>
                        </div>
                    </div>
    </div>  

                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End MAIN CONTENT-->

<?php include('includes/footer.php'); ?>