<?php
// Include config file
include('includes/connection.php');?>


 
 <?php
// Define variables and initialize with empty values
$user_email = $user_password = $confirm_password = "";
$user_email_err = $user_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate user_email
    if(empty(trim($_POST["user_email"]))){
        $user_email_err = "Please enter your email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT user_id FROM users WHERE user_email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_user_email);
            
            // Set parameters
            $param_user_email = trim($_POST["user_email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $user_email_err = "This Email is already taken.";
                } else{
                    $user_email = trim($_POST["user_email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    

    
    // Validate password
    if(empty(trim($_POST["user_password"]))){
        $user_password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["user_password"])) < 6){
        $user_password_err = "Password must have atleast 6 characters.";
    } else{
        $user_password = trim($_POST["user_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($user_password_err) && ($user_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($user_email_err) && empty($user_password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (user_email, user_password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_user_email, $param_user_password);
            
            // Set parameters
            $param_user_email = $user_email;
            $param_user_password = $user_password;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
               header("location: register_success.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
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
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($user_email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="user_email" class="form-control" value="<?php echo $user_email; ?>">
                <span class="help-block"><?php echo $user_email_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($user_password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="user_password" class="form-control" value="<?php echo $user_password; ?>">
                <span class="help-block"><?php echo $user_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                    <span id="payment-button-amount">Register</span>                
                                </button>
              
            </div>
            <p>Already have an account? <a href="welcome_user.php">Login here</a>.</p>
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