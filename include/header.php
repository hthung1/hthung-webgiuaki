<?php 
    session_start();
    $pg;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="ckeditor/ckeditor.js"></script>
    <style>
        .a3a{
            background-color: #fbb710;
            border-radius: 0%;
        }
        .a3a:hover{
            background-color: #fff;
            color: #fbb710;
            border: #fbb710 1px solid;
            
        }
        .a2a:hover{
            border:1px solid #fbb710;
        }
        .dell:hover{
            color:#fbb710;
        }
    </style>
</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="search.php" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="home.php"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="home.php"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    
                    <li <?php if($pg==1) echo'class="active"';?> ><a href="home.php">Home</a></li>
                    <li <?php if($pg==2) echo'class="active"';?> ><a href="shop.php?iddanhmuc=1">Shop</a></li>
                    <li <?php if($pg==3) echo'class="active"';?> ><a href="cart.php">Cart</a></li>
                    <li <?php if($pg==4) echo'class="active"';?> ><a href="checkout.php">Checkout</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:24px;"></i> Cart 
                <span>(
                    <?php 
                        if(isset($_SESSION['cart'])){
                            echo count($_SESSION['cart']);
                        }else{
                            echo 0;
                        }
                
                    ?>
                )</span></a>
                <a href="#"  ><i class="fa fa-heart" style="font-size:24px"></i> Favourite</a>
                <a href="#" class="search-nav"><i class="fa fa-search" style="font-size:24px"></i> Search</a>



                <?php
                    if(isset($_SESSION['role'])){
                        if($_SESSION['role']=='admin'){
                        echo '<a href="themhanghoa.php"><i class="fas fa-plus" style="font-size:24px"></i> Add</a>';
                        }
                    }
                    
                ?>
                
                <?php
                    if(isset($_SESSION['name'])){
                        echo '<a href="logout.php" alt=""><i class="fa fa-sign-out" style="font-size:24px"></i>'.$_SESSION['name'].'</a>';
                    }else{
                        echo '<a href="login.php" alt=""><i class="fa fa-sign-in" style="font-size:24px"></i> Log in</a>';
                    }
                ?>

            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->