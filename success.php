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
        <?php include 'menu.php'; ?>
        
        <div class="page-header">
            <h5>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h5>
            <p>
                <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
                <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
            </p>
        </div>
    </center>

Your order with id : $_SESSION["order_id"] has been placed successfully.<br>
                    If you want to shop more go to <a href='welcome.php'>home page</a><br>
     </body>
</html>