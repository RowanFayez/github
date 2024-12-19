<!DOCTYPE html>
<html lang="en">
    <link rel="icon" type="image/png" href="img/icon.jpg">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rawnaq Home Page</title>
    <!-- Updated Font Awesome 6 Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<!-- <header id="header">
        <a href="#"><i class="fas fa-tshirt" style="color: #000000;"></i></a>

        <div>
           <ul id="navbar">
            <li><a class="active" href="home.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
           <li id="lg-bag"><a href="cart.php"><i class="fas fa-basket-shopping" style="color: #000000;"></i></a></li>  
           <a href="#" id="close"><i class="fas fa-times"></i></a>
          </ul>
       </div>
       <div id="mobile">     
           <a href="cart.php"><i class="fas fa-basket-shopping" style="color: #000000;"></i></a>
           <i id="bar" class="fa fa-bars"></i>
           </ul>
        </div>

        <div id="mobile">     
            <a href="cart.php"><i class="fas fa-basket-shopping" style="color: #000000;"></i></a>
            <i id="bar" class="fa fa-bars"></i>   
            
            
        </div>
</header> -->
<?php require_once('php/header.php'); ?>

<section id="hero">
    <h4>Trade-in-offer</h4>
    <h2>Super Value deals</h2>
    <h2>On all products</h2>
    <p>Save more with copones & up to 70% off</p>
    <button onclick="window.location.href='shop.php'">Shop Now</button>
</section>

<section id="featuer" class="section-p1">
<div class = "fe-box">
    <img src="img/features/feature1.jpg" alt="">
    <h6>Free shipping</h6>
</div>
<div class = "fe-box">
    <img src="img/features/feature2.jpg" alt="">
    <h6>Online Order</h6>
</div>
<div class = "fe-box">
    <img src="img/features/feature3.jpg" alt="">
    <h6>Save Money</h6>
</div>
<div class = "fe-box">
    <img src="img/features/feature4.jpg" alt="">
    <h6>Promotions</h6>
</div>
<div class = "fe-box">
    <img src="img/features/feature5.png" alt="">
    <h6>Happy Sell</h6>
</div>
<div class = "fe-box">
    <img src="img/features/feature6.png" alt="">
    <h6>F24/7 Su</h6>
</div>
</section>

</section>
    <!-- Footer Section -->
    <footer class="footer">
    <div class="col">
        <h4>Contacts</h4>
        <p><strong>Address: </strong> Alex-Egypt</p> 
        <p><strong>Phone: </strong> +123-456-7890</p>
        </p>
        <div class="follow">
            <h4>Follow us</h4>
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest-p"></i>
                <i class="fab fa-x-twitter"></i>
            </div>
        </div>
    </div>
    <div class="col">
        <h4>Branches</h4>
        <p>Egypt</p> 
        <p>Palestine</p> 
        <p>Soul</p> 
        <p>Tokyo</p> 
    </div>
    <div class="col">
        <h4>My Account</h4>
        <a href = "index.php">Sign In</a>
        <a href = "index.php">Sign Up</a>
        <a href = "logout.php">Log Out</a>
    </div>
    <div class="copyright">
        <p>&copy; 2024  Rawnaq. All rights reserved.</p>

    </div>

    </div>
    </footer>



    <script src="script.js"></script>
        <script src="script2.js"></script>

</body>
</html>