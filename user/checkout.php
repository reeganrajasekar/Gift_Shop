
<?php require("../db/db.php");

?><!doctype html>
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
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/ionicons.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/css/plugins.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/style.css">
    <!-- Modernizer JS -->
    <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
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
                                  <a href="/user" class="logo"><h2>Aysh Gift Shop</h2></a>
                                </div>

                                <!-- Header Logo -->
                                <div class="header-logo col-md-4 col-12">
                                </div>

                                <!-- Account Menu -->
                                <div class="account-menu col-md-4 col-12">
                                    <ul>
                                        <li><a href="#" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i></a>
 <!-- Mini Cart -->
                                            <div class="mini-cart-brief dropdown-menu text-left">
                                                <!-- Cart Products -->
                                                <div class="all-cart-product clearfix">
                                                <?php 
                                                    $id = $_COOKIE['id'];
                                                    $sql = "SELECT * from orders where userid='$id' and payment='null' order by id DESC";
                                                    $result = $conn->query($sql);
                                                    
                                                    if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        $gift = $row['giftid'];
                                                        $sql = "SELECT * from gift where id='$gift'";
                                                        $add = $conn->query($sql);
                                                        if ($add->num_rows > 0) {
                                                            // output data of each row
                                                            while($data = $add->fetch_assoc()) {
                                                        
                                                ?>
                                                    <div class="single-cart clearfix">
                                                        <div class="cart-image">
                                                            <a href="#"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['img']); ?>" alt=""></a>
                                                        </div>
                                                        <div class="cart-info">
                                                            <h5><?php echo$data['name']?></h5>
                                                            <p><?php echo$data['rate']?></p>
                                                            <a href="/user/delitem.php?id=<?php echo$row['id']?>" class="cart-delete" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <?php
                                                    }
                                                    } }
                                                } else {
                                                    echo"<p style='text-align:center;padding:10px'>Your Cart is Empty!</p><hr>";
                                    
                                                }
                                                    ?>
                                                </div>
                                                <div class="cart-bottom  clearfix">
                                                    <a href="/user/checkout.php">Place Orders</a>
                                                </div>
                                            </div>


                                        </li>
                                        <li><a href="#" data-toggle="dropdown"><i class="fa fa-user"></i></a>




                                        <div class="mini-cart-brief dropdown-menu text-left">
                                                <!-- Cart Products -->
                                                <div class="all-cart-product clearfix">
                                                <?php 
                                                    $id = $_COOKIE['id'];
                                                    $sql = "SELECT * from orders where userid='$id' and payment!='null' order by id DESC";
                                                    $result = $conn->query($sql);
                                                    
                                                    if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        $gift = $row['giftid'];
                                                        $sql = "SELECT * from gift where id='$gift'";
                                                        $add = $conn->query($sql);
                                                        if ($add->num_rows > 0) {
                                                            // output data of each row
                                                            while($data = $add->fetch_assoc()) {
                                                        
                                                ?>
                                                    <div class="single-cart clearfix">
                                                        <div class="cart-image">
                                                            <a href="#"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['img']); ?>" alt=""></a>
                                                        </div>
                                                        <div class="cart-info">
                                                            <h5><?php echo$data['name']?></h5>
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: <?php echo$row['stat']?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo$row['stat']?>%</div>
                                                            </div>
                                                            <h5><?php echo$row['remark']?></h5>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <?php
                                                    }
                                                    } }
                                                }else{
                                                    echo"<p style='text-align:center;padding:10px'>There is No Orders!</p><hr>";
                                                }
                                                    ?>
                                                </div>
                                                <!-- Cart Button -->
                                                <div class="cart-bottom  clearfix">
                                                    <a href="/">Logout</a>
                                                </div>
                                            </div>

                                        </li>
                                        
                                        
                                    </ul>
                                </div>

                            </div>
                        </div><!-- Header Top Wrapper End -->

                    </div>
                </div>
            </div>
        </div><!-- Header Top End -->
        

        <!-- Cart Section Start-->
        <div class="cart-section section pt-50 pb-30">
            
            <div class="container">
                <h1>Orders</h1>
                <div class="row">
                <div class="col-12">
                   
                    <div class="table-responsive mb-30">
                        <table class="table cart-table text-center">
                            
                            <!-- Table Head -->
                            <thead>
                                <tr>
                                    <th class="number">#</th>
                                    <th class="image">image</th>
                                    <th class="name">product name</th>
                                    <th class="price">price</th>
                                    <th class="remove">remove</th>
                                </tr>
                            </thead>
                            
                            <!-- Table Body -->
                            <tbody>
                            <?php 
                                $id = $_COOKIE['id'];
                                $sql = "SELECT * from orders where userid='$id' and payment='null' order by id DESC";
                                $result = $conn->query($sql);
                                $i = 1;
                                $tot = 0;
                                
                                if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $gift = $row['giftid'];
                                    $sql = "SELECT * from gift where id='$gift'";
                                    $add = $conn->query($sql);
                                    if ($add->num_rows > 0) {
                                        // output data of each row
                                        while($data = $add->fetch_assoc()) {
                                            $tot = $tot+$data['rate'];
                                    
                            ?>
                                <tr>
                                    <td><span class="cart-number"><?php echo$i?></span></td>
                                    <td><a href="#" class="cart-pro-image"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['img']); ?>" alt="" /></a></td>
                                    <td><a href="#" class="cart-pro-title"><?php echo$data['name']?></a></td>
                                    <td><p class="cart-pro-price">Rs . <?php echo$data['rate']?></p></td>
                                    <td><button class="cart-pro-remove"><a href="/user/delitem.php?id=<?php echo$row['id']?>"><i class="fa fa-trash-o"></i></a></button></td>
                                </tr>
                                <?php
                                $i++;
                                    }
                                    } }
                                } else {
                                    echo"<p style='text-align:center;padding:10px'>Your Cart is Empty!</p><hr>";
                    
                                }
                                    ?>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="row">
                       
                        <!-- Cart Action -->
                        <div class="cart-action col-lg-4 col-md-6 col-12 mb-20">
                        </div>
                        
                        <!-- Cart Cuppon -->
                        <div class="cart-cuppon col-lg-4 col-md-6 col-12 mb-20">
                        </div>
                        
                        <!-- Cart Checkout Progress -->
                        <div class="cart-checkout-process col-lg-4 col-md-6 col-12 mb-20">
                            <h4 class="title">Cash On Delivery Only!</h4>
                            <h5><span>Grand total</span><span>Rs . <?php echo$tot?></span></h5>
                            <a href="/user/place.php"><button class="button">Place Order</button></a>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div><!-- Cart Section End-->



       
    <!-- Product Section Start-->
    <div class="product-section section pt-70 pb-20">
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
                <div class="col-lg-3 col-md-6 col-12 mb-20">
                   
                    <div class="product">

                        <!-- Image Wrapper -->
                        <div class="image">
                            <!-- Image -->
                            <a href="/user/view.php?id=<?php echo$row['id']?>" class="img"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" style="height:250px;width:100%" alt="Product"></a>
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
                            
                            <!-- Action Button -->
                        <div class="action-button fix center">
                            <a href="/user/order.php?id=<?php echo$row['id']?>">Add to Cart!</a>
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
<script src="/js/vendor/jquery-1.12.0.min.js"></script>
<!-- Popper JS -->
<script src="/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="/js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="/js/plugins.js"></script>
<!-- Ajax Mail JS -->
<script src="/js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="/js/main.js"></script>
</body>

</html>