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
        
        .message
        {
            position: absolute;
            top: 250px;
            left: 400px;
            text-align: center;
            font-size: 20px;
            background-color: lightblue;
            width: 550px;
            height: 70px;
        }
    </style>
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
    
    
    
    
    
    
     
    
    <strong> <?php echo "USERNAME  :  "."<font color='green'> "."$_SESSION[username]</font>"; 
$sql = "SELECT * FROM `customer` where username = '$_SESSION[username]'";
$result = mysqli_query($link, $sql);

if ((mysqli_num_rows($result) >0) ) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {
            echo "<br><br><center><table><tr><th>Phone number : <td>$row[phone]</tr><tr><th>House No :<td>$row[house_no]</tr><tr><td><b>landmark :</b><td> $row[landmark]</tr><tr><td><b>City :</b> <td>$row[city]</tr><tr><td><b>State :</b><td> $row[state]</tr><tr><td><b>Pin code :</b><td>$row[pin]</tr></table></center>" ;
    }
} else {
    echo "0 results";
}

?>
    </strong> 
        <center>
    <strong> <?php    
$n = 3; 
$result = bin2hex(random_bytes($n));
        echo "<br>ORDER ID  :   "."<font color='#F5B041'>"."<b>$result</b>"."</font>"; 
        $_SESSION["order_id"]=$result;
        
        ?></strong>
        
        
        
        
        
        <div class="table"><form action="" method="post"><table >
        <tbody>
            <tr>
                    <td></td>
                    <td>ITEM NAME</td>
                    <td>QUANTITY</td>
                    <td>UNIT PRICE</td>
                    <td>ITEMS TOTAL</td>
            </tr>	
<?php		
            foreach ($_SESSION["shopping_cart"] as $product)
            {
?>
            <tr>
                <td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
                <td><?php echo $product["name"]; ?><br />
                    
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
  
</td>
<td>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
    
 <?php echo $product["quantity"];?> 

</td>
<td><?php echo "<b>&#8377</b>".$product["price"]; ?></td>
<td><?php echo "<b>&#8377</b>".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php

}
?>

</tbody>
        </table>
        <b>TOTAL  : </b><?php echo "<b>&#8377</b>".$_SESSION["checkout"];  ?>
    
    <br>
            <input type="submit" value="SUBMIT ORDER" name="confirm_order"></form>
        </div></center>
    
    
    
    
    
   




    
    
    
    
   
    
    
    <?php	
    if(isset($_POST['confirm_order']))
    {
        if(!empty($_SESSION["shopping_cart"])) 
        {
                 (int)$cart_count = count(array_keys($_SESSION["shopping_cart"]));
                foreach ($_SESSION["shopping_cart"] as $product)
                {
                    $code=$product["code"];
                    $price=$product["price"];
                    $quantity=$product["quantity"];
                    $sub_total=$product["price"]*$product["quantity"]; 
                    
                    $sqli="INSERT INTO `order_products` (`order_id`, `username`, `code`, `price`, `quantity`,`sub_total`) VALUES ('$result','$_SESSION[username]','$code','$price','$quantity','$sub_total')";
                    mysqli_query($link,$sqli);
                        
                    echo "<div class='message'>Your order with id : <font color='green'>$_SESSION[order_id]</font> has been placed successfully.<br>
                    If you want to shop more go to <a href='https://periphrastic-fists.000webhostapp.com/welcome.php'>home page</a><br></div>";
                    
                }
        
        }
    }
    ?>
    </body>
</html>
