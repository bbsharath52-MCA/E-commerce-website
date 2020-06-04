
<html>
    <head>
        
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body
            {
                margin: auto;
                padding: 0px;
                text-align: center;
            }
            .header
            {
                width: 100%;
                display: flex; 
                border: 3px solid lightgreen; 
            }
           .menu  {
               height: 125px;
               width: 100%;
                text-align: center;
                overflow: hidden;  
               font-family: sans-serif;
               background-color: #3498DB;
``          }
           
            .menu a
            {
                display: inline-block;
                text-align: center;
                margin-top: 60px;
                text-decoration: none;
                text-transform: uppercase;
                padding: 14px 25px;
                font-size: 25px;
               color: white;
            }
            .menu a:after
            {
                content: "";
                width: 0%;
                height: 3px;
                margin-top: 5px;
                display: block;
                background-color: orange;
            }
            .menu a:hover::after
            {
                content: "";
                width: 100%;
                transition: 0.5s;
            }
            .search_box
            {
                position: relative;
                background-color: #3498DB;
                width: 350px;
            }
            input 
            {
                border: 2px solid #F1C40F;
                width: 350px;
                height: 30px;
                margin-top: 30px;
                margin-left: 30px;
                border-radius: 15px;
            }
            .search-btn
            {
                position: absolute;
                top: 35px;
                left: 350px;
                font-size: 20px;
            }
</style>
    </head>
<body>
   <div class="header">
        <img src="https://i.ibb.co/6RqpmSr/TITLE-LOGO.png" alt="tilt-logo" border="0" width="250" height="125">
       
    <div class="menu">
        <a href="https://periphrastic-fists.000webhostapp.com/about_us.php">About US</a>
        <a href="https://periphrastic-fists.000webhostapp.com/login.php">Login</a> 
        <?php
                if(!empty($_SESSION["shopping_cart"])) {
                $cart_count = count(array_keys($_SESSION["shopping_cart"]));}
            ?>
            <div class="cart_div">
                <a href="cart.php"><img src="cart-icon.png" /><?php echo "<font size = '5' color='tomato'> <sup>$cart_count</sup></font>"; ?></a>
            </div>
    </div>
    </div>
</body>
</html>