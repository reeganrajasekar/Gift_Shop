<?php require("./db/db.php");

?>

<!doctype html>
<html  lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Aysh Gift Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet"> 
    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="css/plugins.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernizer JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body style="height:700px">



    <!-- Header Section Start -->
    <div class="header-section section" >
       
        <!-- Header Top Start -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <!-- Header Top Wrapper Start -->
                        <div class="header-top-wrapper">
                            <div class="row">

                                <!-- Header Social -->
                                <div class="header-social col-md-4 col-12"> 
                                  <a href="/" class="logo"><h2>Aysh Gift Shop</h2></a>
                                </div>

                                <!-- Header Logo -->
                                <div class="header-logo col-md-4 col-12">
                                </div>

                                <!-- Account Menu -->
                                <div class="account-menu col-md-4 col-12">
                                    <ul>
                                        <li><a href="/Login.php">SignIn</a></li>
                                        <li><a href="/signup.php">SignUp</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div><!-- Header Top Wrapper End -->

                    </div>
                </div>
            </div>
        </div><!-- Header Top End -->
        

       
    <!-- Hero Slider Start-->
    <div class="hero-slider section fix" style="height:600px">

        <!-- Hero Slide Item Start-->
        <div class="hero-item" style="background-image: url(img/slide.jpg);height:600px" >

            <!-- Hero Content Start-->
            <div class="hero-content text-center m-auto">

                <h2 style="-webkit-text-stroke: 2px green;">Save 25%</h2>
                <h1 style="-webkit-text-stroke: 2px green;">One Time offer</h1>

            </div><!-- Hero Content End-->


        </div><!-- Hero Slide Item End-->

        <!-- Hero Slide Item Start-->
        <div class="hero-item" style="background-image: url(img/slide1.jpg);height:600px">

            <!-- Hero Content Start-->
            <div class="hero-content text-center m-auto">

                <h2 style="-webkit-text-stroke: 2px green;">Save 25%</h2>
                <h1 style="-webkit-text-stroke: 2px green;">One Time offer</h1>

            </div><!-- Hero Content End-->


        </div><!-- Hero Slide Item End-->

    </div><!-- Hero Slider End-->
    
       
   
       
    <!-- Product Section Start-->
    <div class="product-section section pt-70 pb-60">
        <div class="container">
           
            <!-- Section Title Start-->
            <div class="row">
                <div class="section-title text-center col mb-60">
                    <h1>Featured Products</h1>
                </div>
            </div><!-- Section Title End-->
            
            <!-- Product Wrapper Start-->
            <div class="row">
            <?php 
            $sql = "SELECT * from gift order by id DESC";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                
                ?>
                <!-- Product Start-->
                <div class="col-lg-4 col-md-6 col-12 mb-60">
                   
                    <div class="product">

                        <!-- Image Wrapper -->
                        <div class="image">
                            <!-- Image -->
                            <a href="/Login.php" class="img"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" style="height:250px;width:100%" alt="Product"></a>
                            <!-- Wishlist -->
                            <!-- Label -->
                            <span class="label" >New</span>
                        </div>
                        
                        <!-- Content -->
                        <div class="content">
                            
                            <!-- Head Content -->
                            <div class="head fix">
                               
                                <!-- Title & Category -->
                                <div class="title-category float-left">
                                    <h5 class="title"><a href="/Login.php"><?php echo $row['name']?></a></h5>
                                    <span class="new"><?php echo $row['disc']?></span>
             
                                </div>
                                <!-- Price -->
                                <div class="price float-right">
                                    <span class="new">Rs . <?php echo $row['rate']?></span>
                                    <!-- Old Price Mockup If Need -->
                                    <!-- <span class="old">$46</span> -->
                                </div>
                                
                            </div>
                            
                        </div>

                    </div>
                    
                </div><!-- Product End-->

                <?php
              }
            } 
            ?>
                
                
            </div><!-- Product Wrapper End-->
            
        </div>
    </div><!-- Product Section End-->

    
    
    
    <!-- Footer Section Start-->
    <div class="footer-section section bg-dark" >
        <div class="container">
            
            <h4 style="text-align:center" class="pt-10">All Rights Reserved</h4>
            
        </div>
    </div><!-- Footer Section End-->
    


<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="js/vendor/jquery-1.12.0.min.js"></script>
<!-- Popper JS -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="js/plugins.js"></script>
<!-- Main JS -->
<script src="js/main.js"></script>
</body>

</html>