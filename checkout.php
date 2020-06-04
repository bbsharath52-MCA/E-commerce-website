<?php
// start session
session_start();
 
// connect to database
require 'config.php';
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: login.php");
    exit;
}

?>

 <html>
<head>
<title>HomePage</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <style>
        .billing_address{ width: 500; }
        .open-button {
  background-color: #555;
  color: white;
  padding: 5px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  width: 280px;
}
        .open-button2 {
  background-color: #115599;
  color: white;
  padding: 5px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  width: 280px;
}
        .open-button2:hover,.open-button:hover
        {
            opacity: 1;
        }
        .chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}
        .form-container {
  background-color: coral;
  color: white;
  padding: 16px 20px;
  border: 2px ;
  width: 500px;
  margin-bottom:10px;
}
        .save
        {
            width: 200px;
            background-color: #555;
        }
        .cancel
        {
            width: 200px;
            background-color: lawngreen;
            color: blueviolet;
        }
        .form-container input
        {
            border-radius: 2px;
            color:tomato;
        }
        .payment_box
        {
            color: #555;
            width: 500px;
            height: 150px;
            padding: 15px;
            text-align: center;
            background-color: white;
            position: absolute;
            top: 250px;
            left: 400px;
            border: 2px solid green;
        }
    </style>
    
    <script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
        
function openForm2() {
  document.getElementById("myForm2").style.display = "block";
}
function closeForm2() {
  document.getElementById("myForm2").style.display = "none";
}
        function validateForm() {
  var pi = document.forms["myForm"]["pin"].value;
            if (pi == "" || pi.length!=6)  {
    alert("Pin number must be 6 digits");
    return false;
  }
}
        
        function validateForm2() {
  var pi = document.forms["myForm2"]["pin"].value;
  
            if (pi == "" || pi.length!=6)  {
    alert("Pin number must be 6 digits");
    return false;
  }
}
</script>
</head>
<body>
<center>
        <?php include 'menu.php'; ?>
        
        <div class="page-header">
            <h5>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h5>
            <p>
                <a href="https://periphrastic-fists.000webhostapp.com/reset-password.php" class="btn btn-warning">Reset Your Password</a>
                <a href="https://periphrastic-fists.000webhostapp.com/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
            </p>
        </div>
    </center>
    
    
    <strong>TOTAL: <?php echo "<b>&#8377</b>".$_SESSION["checkout"]; ?></strong>

    <br><strong> <?php echo "USERNAME  :  " .$_SESSION["username"]; 
$sql = "SELECT * FROM `customer` where username = '$_SESSION[username]'";
$result = mysqli_query($link, $sql);

if ((mysqli_num_rows($result) >0) ) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo   " <br> "  . $row["house_no"]. " <br>" . $row["landmark"]." <br>" . $row["city"]." <br>" . $row["state"]." <br>" . $row["pin"];
    }
} else {
    echo "address not saved";
}

?>
    </strong> 
    
    <center><h3>If you are new customer click <button class="open-button" onclick="openForm()">save address</button> to save shipping address.<br><br>
        If you are already customer click <button class="open-button2" onclick="openForm2()"> update address</button> to save or update shipping address.</h3>
        <div class="chat-popup" id="myForm">
    <form action="" method="post" class="form-container" onsubmit="return validateForm()" name="myForm">
        <input type="text" name="username" placeholder="username" value="<?php echo $_SESSION["username"]; ?>" disabled><br>
        <input type="text" name="house_no" placeholder="house number"  required pattern="[0-9a-zA-Z/-*]{3,}" title="house number should not contain spexial characters !@#$%^&><|?"><br>
        <input type="text" name="landmark" placeholder="landmark" required pattern="[a-za-Z\s]{3,}" title="landmark of your shipping address. "><br>
        <input type="text" name="city" placeholder="city"  required pattern="[A-Za-z]{3,}" title="city of your shipping address"><br>
        <input type="text" name="state" placeholder="state"  required pattern="[A-Za-z]{3,}" title="state of your shipping address"><br>
        <input type="number" name="pin" placeholder="pin code"  required  pattern="[0-9]{6}" title="Pincode should be 6 digits"><br>
        <input type="submit" value="SAVE ADDRESS" name="chng_add" class="save">
        <button type="button" class="cancel" onclick="closeForm()">Close</button>
            </form></div>
        
        
        <div class="chat-popup" id="myForm2">
    <form action="" method="post" class="form-container" onsubmit="return validateForm2()" name="myForm2">
        <input type="text" name="username" placeholder="username" value="<?php echo $_SESSION["username"]; ?>" disabled><br>        

        <input type="text" name="house_no" placeholder="house number"   required pattern="[0-9a-zA-Z/-*]{3,}" title="house number should not contain spexial characters !@#$%^&><|?"><br>
        <input type="text" name="landmark" placeholder="landmark"  required pattern="[a-za-Z\s]{3,}" title="landmark of your shipping address"><br>
        <input type="text" name="city" placeholder="city"  required pattern="[A-Za-z]{3,}" title="city of your shipping address"><br>
        <input type="text" name="state" placeholder="state"  required pattern="[A-Za-z]{3,}" title="state of your shipping address"><br>
        <input type="number" name="pin" placeholder="pin code" required  pattern="[0-9]{6}" title="Pincode should be 6 digits"><br>
        <input type="submit" value="UPDATE ADDRESS" name="update_add" class="save"><button type="button" class="cancel" onclick="closeForm2()">Close</button>
            </form></div></center>
   
   <?php $username = $_SESSION["username"]; 
    
    ?>
    
                <?php
        if(isset($_POST['chng_add']))
        {                  
            $insert=mysqli_query($link,"INSERT INTO `customer` ( `customer_id`, `username`, `house_no`, `landmark`, `city`, `state`, `pin`) VALUES ('', '$username',  '$_POST[house_no]', '$_POST[landmark]', '$_POST[city]', '$_POST[state]', '$_POST[pin]')");  
            echo "<div class='payment_box'>Go to payment page.<br>Select COD or Online payment.<a href='payment.php'><input type='submit' value='PAYMENT' enabled></a></div>";
        }
    ?>
                
    <?php
        if(isset($_POST['update_add']))
        {                               
            $sql = "UPDATE `customer` SET `customer_id` = NULL,  `house_no` = '$_POST[house_no]', `landmark` = '$_POST[landmark]', `city` = '$_POST[city]', `state` = '$_POST[state]', `pin` = '$_POST[pin]' WHERE `customer`.`username` = '$_SESSION[username]'";
            $insert=mysqli_query($link,$sql);   
            echo "<div class='payment_box'>Go to payment page.<br>Select COD or Online payment.<a href='payment.php'><input type='submit' value='PAYMENT' enabled></a></div>";
        }
    ?>
    
    
    
    
    
    
    
    
    </body>
</html>
