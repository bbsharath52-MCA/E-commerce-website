<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
session_start();
 require 'config.php';
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: login.php");
    exit;
}



$status="";
if (isset($_POST['action']) && $_POST['action']=="remove")
{
    if(!empty($_SESSION["shopping_cart"])) 
    {
        foreach($_SESSION["shopping_cart"] as $key => $value) 
        {
		          if($_POST["code"] == $key)
                  {
		              unset($_SESSION["shopping_cart"][$key]);
		              $status = "<div class='box' style='color:red;'>
		              Product is removed from your cart!</div>";
		          }
                  if(empty($_SESSION["shopping_cart"]))
		          unset($_SESSION["shopping_cart"]);
        }		
    }
}



if (isset($_POST['action']) && $_POST['action']=="change")
{
  foreach($_SESSION["shopping_cart"] as &$value)
  {
        if($value['code'] === $_POST["code"])
        {
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product
        }
  }       
  	
}

?>




<html>
<head>
<title>HomePage</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <style>
        <style>
            body
            {
                background-color: aliceblue;
            }
            .page-header
            {
                top: -40px;
                position: relative;
                width: 100%;
                padding: 5px;
                background-color: antiquewhite;
            }
            .product_wrapper {
	float:left;
	padding: 10px;
	text-align: center;
                background-color: white;
	}
.product_wrapper:hover {
	box-shadow: 0 0 0 2px #e5e5e5;
	cursor:pointer;
	}
.product_wrapper .name {
	font-weight:bold;
	}
.product_wrapper .buy {
	text-transform: uppercase;
    background: #F68B1E;
    border: 1px solid #F68B1E;
    cursor: pointer;
    color: #fff;
    padding: 8px 40px;
    margin-top: 10px;
}
.product_wrapper .buy:hover {
	background: #f17e0a;
    border-color: #f17e0a;
}
        .buy
        {
            background-color: tomato;
            border-radius: 2px;
            font-size: 15px;
            width: 250px;
            color: white;
            height: 40px;
        }
        .buy:hover
        {
            box-shadow: 5px 3px 5px 3px tomato;
        }
    </style>
</head>
<body>
        <?php include 'menu.php'; ?>
        <center>
        <div class="page-header">
            Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.
           
                <a href="https://periphrastic-fists.000webhostapp.com/reset-password.php" class="btn btn-warning">Reset Your Password</a>
                <a href="https://periphrastic-fists.000webhostapp.com/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
        </div> 
            <div class="message_box" style="margin:10px 0px;">
    <?php echo $status; ?>
    </div>
            <div style="width:700px; margin:50 auto;">

                <h2>Demo Shopping Cart</h2>   
                <?php
                if(!empty($_SESSION["shopping_cart"])) 
                {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                ?>
                
                <div class="cart_div">
                    
                    <a href="cart.php">
                        <img src="https://periphrastic-fists.000webhostapp.com/cart-icon.png" /> Cart
                        <span><?php echo $cart_count; ?></span></a>
                </div>
                <?php
                }
                ?>

                
                
                
                
                
                
<div class="cart">
<?php
    
    $_SESSION["cart_count"]=$cart_count;
        if(isset($_SESSION["shopping_cart"]))
        {
            $total_price = 0;
?>	
    <table class="table">
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
                    <form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
                        <button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "<b>&#8377</b>".$product["price"]; ?></td>
<td><?php echo "<b>&#8377</b>".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
            <?php $_SESSION["checkout"]= $total_price;  ?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "<b>&#8377</b>".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>	
    <a href="https://periphrastic-fists.000webhostapp.com/checkout.php"><input type="button" value="check out" class="buy"></a>
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>


</div>
</body>
</html>