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
        .buy
        {
            background-color: white;
            border-radius: 2px;
            font-size: 15px;
            width: 250px;
            color: blue;
            height: 40px;
            opacity: 0.8;
        }
        .buy:hover
        {
            opacity: 1;
        }
        .payment_selected
        {
            background-color: skyblue;
            width: 600px;
            height: 150px;
            border: 1px solid tomato;
            position: absolute;
            top: 200px;
            left: 400px;
        }
    </style>
    <script>
        function validate()
        {
            var valid=false;
            var x = document.payment.payment_type;
            
            for(var i=0;i<x.length;i++)
                {
                    if(x[i].checked)
                        {
                            valid=true;
                            break;
                        }
                }
            if(valid)
                {
                    
                }else
                    {
                        alert("please a mode of payment");
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

    <br>
    <strong> 
        <?php echo "USERNAME  :  " .$_SESSION["username"]; 
        $sql = "SELECT * FROM `customer` where username = '$_SESSION[username]'";
        $result = mysqli_query($link, $sql);

        if ((mysqli_num_rows($result) >0) ) 
        {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) 
        {
            echo "<br><br><center><table><tr><th>House No :<td>$row[house_no]</tr><tr><td><b>landmark :</b><td> $row[landmark]</tr><tr><td><b>City :</b> <td>$row[city]</tr><tr><td><b>State :</b><td> $row[state]</tr><tr><td><b>Pin code :</b><td>$row[pin]</tr></table></center>" ;
        }
        } 
        ?>
    </strong> 
    
    
    <center><h1>PAYMENT TYPE</h1>
    <form action="" method="post" name="payment" onsubmit="return validate()">
        <input type="text" name="username" placeholder="username" value="<?php echo $_SESSION["username"]; ?>" disabled>
        <table>
            <tr><td><input type="radio" name="payment_type" value="cash on delivery"><td> cash on delivery</tr>
            <tr><td><input type="radio" name="payment_type" value="online pay" disabled><td> online payment <br><font color="red" size="2">(currently online payment not working)</font></tr>
        </table>
        <input type="submit" value="PAYMENT " name="payment" class="buy">
    </form></center>
    
    <?php $username = $_SESSION["username"]; ?>
    
                <?php
                  if(isset($_POST['payment']))
                  {                  

                    $insert=mysqli_query($link,"INSERT INTO `payment` (`pay_id`,`username`, `payment_type`) VALUES ('','$username', '$_POST[payment_type]')");  
                      echo "<div class='payment_selected'><h1>PAYMENT SELECTED AS COD </h1><a href='https://periphrastic-fists.000webhostapp.com/place_order.php'><input type='submit' value='PLACE ORDER' enabled class='buy'></a></div>";
                 }
    ?>
    
     </body>
</html>