<?php 
ob_start();
include('includes/connection.php');?>

<?php
 include('includes/headerInner.php');
?>


 
<?php
// Define variables and initialize with empty values
$user_email = $user_firstname = $user_lastname = $user_password = $confirm_password = "";
$user_email_err = $user_firstname_err =$user_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate user_email
    if(empty(trim($_POST["user_email"]))){
        $user_email_err = "<p style='color:red;'>Please enter your email.</p>";
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
                    $user_email_err = "<p style='color:red;'>This Email is already taken.</p>";
                } else{
                    $user_email = trim($_POST["user_email"]);
                    $user_firstname = trim($_POST["user_firstname"]);
                    $user_lastname = trim($_POST["user_lastname"]);
                }
            } else{
                echo "<<p style='color:red;'>>Oops! Something went wrong. Please try again later.</p>";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    

    
    // Validate password
    if(empty(trim($_POST["user_password"]))){
        $user_password_err = "<p style='color:red;'>Please enter a password.</p>";     
    } elseif(strlen(trim($_POST["user_password"])) < 6){
        $user_password_err = "<p style='color:red;'>Password must have atleast 6 characters.</p>";
    } else{
        $user_password = trim($_POST["user_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "<p style='color:red;'>Please confirm password.</p>";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($user_password_err) && ($user_password != $confirm_password)){
            $confirm_password_err = "<p style='color:red;'>Password did not match.</p>";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($user_email_err) && empty($user_password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (user_email, user_password, user_firstname, user_lastname) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_user_email, $param_user_password, $param_user_firstname, $param_user_lastname);
            
            // Set parameters
            $param_user_email = $user_email;
            $param_user_password = $user_password;
            $param_user_firstname = $user_firstname;
            $param_user_lastname = $user_lastname;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
               header("location: register_success.php"); 
            } else{
                echo "<p style='color:red;'>Something went wrong. Please try again later.</p>";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    
}


?>



    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Create Account</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Registeration</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain login-page">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                        <div class="intro">
                                <h2 class="box-title">Happy to have a new plant parent!</h2>
                                <p class="sub-title">Now let's create a secure account for you</p>
</br>
</br>
                                
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="frm-login" method="post" style="align-items:center;">
                            <p class="form-row <?php echo (!empty($user_email_err)) ? 'has-error' : ''; ?>" >
                                    <label for="fid-name">First Name:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="user_firstname" value="<?php echo $user_firstname; ?>" class="txt-input">
                                    <span class="help-block"><?php echo $user_firstname_err; ?></span>
                               
                                    <label for="fid-name">Last Name:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="user_lastname" value="<?php echo $user_lastname; ?>" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="user_email" value="<?php echo $user_email; ?>" class="txt-input">
                                    <span class="help-block"><?php echo $user_email_err; ?></span>
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="user_password" value="<?php echo $user_password; ?>" class="txt-input">
                                    <span class="help-block"><?php echo $user_password_err; ?></span>
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Repeat Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="confirm_password" value="<?php echo $confirm_password; ?>" class="txt-input">
                                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                                </p>
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-submit btn-bold" name ="submit" type="submit">Create Account</button>
                                    
                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <img id="img3" src="assets/images/home-02/pexels-photo-5691900.jpeg" width="600" height="680" alt="img msv">
                    </div>

                </div>

            </div>

        </div>

    </div>

  
    <?php include ('includes/footer.php');?>