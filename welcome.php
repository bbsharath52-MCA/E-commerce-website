<?php
// Initialize the session
session_start();
 require 'config.php';
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 <?php
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($link,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$actual_price = $row['actual_price'];
$save_price = $row['save_price'];
$image = $row['image'];
    
  
    

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
        'actual_price'=>$actual_price,
        'save_price'=>$save_price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<script>window.alert('Product is added to your cart!')</script>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<script>window.alert('Product is already added to your cart!')</script>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<script>window.alert('Product is added to your cart!')</script>";
	}

	}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HomePage</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
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
    border: 1px solid gray;
	float:left;
	padding: 10px;
	text-align: center;
                background-color: white;
	}
.product_wrapper:hover {
	box-shadow: 4px 4px 4px gray;
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
.name
            {
                text-align: left;
                padding: 15px;
            }
            strike
            {
                background-color: tomato;
            }
            .price
            {
                background-color: greenyellow;
            }
            .save_price
            {
                margin: 10px;
                font-size: 12px;
                background-color: dodgerblue;
                width: 60px;
                color: white;
                border-radius: 10px;
            }
            c
            {
                font-size: 15px;
            }
            .buy a
            {
                text-decoration: none;
                color: white;
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
            <h2>Select Product into Shopping Cart </h2> 
            
            
        
        <div class="message_box" style="margin:10px 0px;">
    <?php echo $status; ?>
    </div>
    
     
   
    <?php
        
            $result = mysqli_query($link,"SELECT * FROM `products`");
            while($row = mysqli_fetch_assoc($result)){
		  echo "<div class='product_wrapper'>
			  <form method='post' action='welcome.php'>
			  <div class='name'></div>
			  <div class='name'>".$row['name']."</div>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <input type='hidden' name='name' value=".$row['name']." />
			  <div class='image'>
                                <img src=".$row['image']." /></div>            
		   	  <div class='price'> <font size='4'>Our Price : &#8377 ".$row['price']."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strike >MRP : &#8377 " .$row['actual_price']."</strike></div>
		   	  <center><div class='save_price'> save <br><c>  &#8377 " .$row['save_price']."</c></div></center>
			  <button type='submit' class='buy'>ADD TO CART</button>
			  </form>
		   	  </div>";
        }
            mysqli_close($link);
?>

    <div style="clear:both;"></div>
    
    </center>
</body>
</html>