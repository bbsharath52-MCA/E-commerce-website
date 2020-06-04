<?php
// start session
session_start();
 
// connect to database
require 'config.php';
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
else

?>

 <html>
<head>
<title>HomePage</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <style>
        .billing_address{ width: 500; }
    </style>
</head>
<body>
<center>
        <img src="https://i.ibb.co/vDM2D14/tilt-logo.png" alt="tilt-logo" border="0" width="250" height="150">
        <?php include 'menu.php'; ?>
        
        <div class="page-header">
            <h5>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h5>
            <p>
                <a href="https://periphrastic-fists.000webhostapp.com/reset-password.php" class="btn btn-warning">Reset Your Password</a>
                <a href="https://periphrastic-fists.000webhostapp.com/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
            </p>
        </div>
    </center>
    
    
    
    
    
    
    
    
    
    <?php
    echo "Your order with number :" .$_SESSION["order_id"]." was placed SUCCESSfully";
    ?>
    
    </body>
</html>
