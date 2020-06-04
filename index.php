   
            
<html>
    <head>
        <title>HomePage</title>
        <style>
           *{
                margin: 0;
                padding: 0;
                
            }
            body
            {
                background-color: aliceblue;
            }
            
            h1{
                text-align: center;
                
                font-size: 50px;
                color: #999999;
            }
            h3{
                text-align: center;
                
                font-size: 30px;
                color: DodgerBlue;
            }
            @keyframes slide
            {
                0%
                {
                    left:  0;
                }
                10%
                {
                    left:  -00%;
                }
                25%
                {
                    left:  -0%;
                }
                50%
                {
                    left:  -100%;
                }
                75%
                {
                    left:  -100%;
                }
                95%
                {
                    left:  -100%;
                }
                100%
                {
                    left:  0;
                }
            }
            .slider
            {
                overflow: hidden;
            }
            .slider figure img
            {
                float: left;
                width: 50%;
            }
            .slider figure
            {
                position: relative;
                width: 200%;
                animation: slide 15s infinite;
            }
            .announcement
            {
                text-align: left;
                padding: 10px;
                border-bottom: 1px solid lightgray;
                background-color: antiquewhite;
                width: 100%;
                margin-bottom: 5px;
            }
            .essentials
            {
                text-align: left;
                margin: 25px;
                width: 95%;
                font-size: 25;
                background-color: aliceblue;
            }
            .essentials section
            {
                text-align: left;
                margin: 20px;
                padding: 5px;
                border-bottom: 2px solid lightgray;
            }
            .deals
            {
                margin: 25px;
            }
            .deals_essentials
            {
                width: 1200px;
            }
            .small
            {
                width: 580px;
            }
            .big
            {
                width: 580px;
            }
            .about
            {
                width: 1200px;
                text-align: justify;
                font-size: 15px;
                border: 1px solid black;
                margin: 25px;
                padding: 25px;
                color: gray;
            }
        </style>
    </head>
<body>
    
    
    <?php include 'menu.php'; ?>
    <div class="slider">
        <figure>
            <div class="slide">
                <img src="product-images/carousel1.jpg" height="350px" width="33%">
            </div>
            <div class="slide">
                <img src="product-images/carousel2.jpg" height="350px">
            </div>
        </figure>
    </div>
    
    <div class="announcement">
        <table width=100%>
            <tr>
                <th ><font color="tomato" size="5px">Annonuncement :</font>
                <td><font color="gray"><marquee direction="left">Dear Customer, the offers stock was solding out and there limited stock so please buy fast.               </marquee></font>
            </tr>
        </table>
    </div>
        
    <div class="essentials">
        <section>
            Monthly Essentials
        </section>
        <center>
        <div class="deals">
                <img src="product-images/crousal_oil_ghee.jpg"  width="400">
            
                <img src="product-images/crousal_oil_ghee.jpg"  width="400">
            
                <img src="product-images/crousal_oil_ghee.jpg"  width="400">
        </div>
            
        <img src="product-images/crousal_mid_snack.jpg" width="95%" >
        
        <section>
            Monthly Essentials
        </section>
        <div class="deals">
                <img src="product-images/crousal_oil_ghee.jpg"  width="400">
            
                <img src="product-images/crousal_oil_ghee.jpg"  width="400">
            
                <img src="product-images/crousal_oil_ghee.jpg"  width="400">
        </div>
            
        <section>
            <center>Cleaning & Household</center>
        </section>
        <div class="deals">
                <img src="product-images/detergent-powder.jpg"  width="300">
            
                <img src="product-images/detergent-powder.jpg"  width="300">
            
                <img src="product-images/detergent-powder.jpg"  width="300">
            
                <img src="product-images/detergent-powder.jpg"  width="300">
        </div>
            
        <section>
            <center>Personal Care</center>
        </section>
        <div class="deals">
                <img src="product-images/soap-handwash.jpg"  width="300">
            
                <img src="product-images/soap-handwash.jpg"  width="300">
            
                <img src="product-images/soap-handwash.jpg"  width="300">
            
                <img src="product-images/soap-handwash.jpg"  width="300">
        </div>
            
            <section>
            <center>Snacks</center>
        </section>
            <div class="deals_essentials">
                <table cellspacing="10px" cellpadding="10px">
                <tr>
                    <td rowspan="2"><img src="product-images/namkeens.jpg"  width="600">
                    <td><img src="product-images/namkeens.jpg"  width="100%" >
                    <td><img src="product-images/namkeens.jpg"  width="100%">
                </tr>
                <tr>
                    <td><img src="product-images/namkeens.jpg"  width="100%">
                    <td><img src="product-images/namkeens.jpg"  width="100%">
                </tr>
                </table>
            </div>
        
        <div class="about">
            <font size="5">bigbasket – online grocery store</font><br><br>
Did you ever imagine that the freshest of fruits and vegetables, top quality pulses and food grains, dairy products and hundreds of branded items could be handpicked and delivered to your home, all at the click of a button? India’s first comprehensive online megastore, bigbasket.com, brings a whopping 20000+ products with more than 1000 brands, to over 4 million happy customers. From household cleaning products to beauty and makeup, bigbasket has everything you need for your daily needs. bigbasket.com is convenience personified We’ve taken away all the stress associated with shopping for daily essentials, and you can now order all your household products and even buy groceries online without travelling long distances or standing in serpentine queues. Add to this the convenience of finding all your requirements at one single source, along with great savings, and you will realize that bigbasket- India’s largest online supermarket, has revolutionized the way India shops for groceries. Online grocery shopping has never been easier. Need things fresh? Whether it’s fruits and vegetables or dairy and meat, we have this covered as well! Get fresh eggs, meat, fish and more online at your convenience. Hassle-free Home Delivery options<br><br>

We deliver to 25 cities across India and maintain excellent delivery times, ensuring that all your products from groceries to snacks branded foods reach you in time.<br><br>
<ul>
    <li>Slotted Delivery: Pick the most convenient delivery slot to have your grocery delivered. From early morning delivery for early birds, to late-night delivery for people who work the late shift, bigbasket caters to every schedule.
    <li>Express Delivery: This super useful service can be availed by customers in cities like Bangalore, Mumbai, Pune, Chennai, Kolkata, Hyderabad and Delhi-NCR in which we deliver your orders to your doorstep in 90 Minutes.
    <li>BB Specialty stores: Missed out on buying that essential item from your favorite neighborhood store for tonight’s party? We’ll deliver it for you! From bakery, sweets and meat to flowers and chocolates, we deliver your order in 90 minutes, through a special arrangement with a nearby specialty store, verified by us.<br><br>
        <font size="5">India’s biggest Online Supermarket</font><br><br>
bigbasket.com believes in providing the highest level of customer service and is continuously innovating to meet customer expectations. Our On-time Guarantee is one such assurance where we refund 5% of the bill value if the delivery is delayed. For all your order values above Rs. 1000, we provide free delivery. A wide range of imported and gourmet products are available through our express delivery and slotted delivery service. If you ever find an item missing on delivery or want to return a product, you can report it to us within 48 hours for a ‘no-questions-asked’ refund.<br><br>

Best quality products for our quality-conscious customers.<br><br>

bigbasket.com is synonymous with superior quality and continues to strive for higher levels of customer trust and confidence, by taking feedback and giving our customers what they want. We have added the convenience of pre-cut fruits in our Fresho range. If it’s a product category you’re looking to shop from, we’ve made it convenient for you to access all products in a section easily. For instance, if you’re looking for beverages, you can order from a long list of beverages that include cool drinks, hot teas, fruit juices and more.<br><br>

We are proud to be associated closely with the farmers from whom we source our fresh products. Most of our farm-fresh products are sourced directly from farmers, which not only ensures the best prices and freshest products for our customers but also helps the farmers get better prices. With more than 80 Organic Fruits and Vegetables and a wide range of organic staples, bigbasket has the largest range in the organic products category.<br><br>

        When it comes to payment, we have made it easy for our customers can pay through multiple payment channels like Credit and Debit cards, Internet Banking, e-wallets and Sodexo passes or simply pay Cash on Delivery (COD).The convenience of shopping for home and daily needs, while not compromising on quality, has made bigbasket.com the online supermarket of choice for thousands of happy customers across India.</ul>
        </div>
        </center>
    </div>
    
    
    
    

</body>
</html>



