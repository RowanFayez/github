<?php
$current_page = basename($_SERVER['PHP_SELF']);  
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link rel="stylesheet" href="style3.css">
</head>
<header id="header">
    <a href="#"><i class="fas fa-tshirt" style="color: #000000;">Rawnaq</i></a>

    <div>
        <ul id="navbar">
            <li><a class="<?php echo ($current_page == 'home.php') ? 'active' : ''; ?>" href="home.php">Home</a></li>
            <li><a class="<?php echo ($current_page == 'shop.php') ? 'active' : ''; ?>" href="shop.php">Shop</a></li>
            <li><a class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>" href="about.php">About Us</a></li>
            <li><a class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>" href="contact.php">Contact Us</a></li>
            <!-- Corrected Icon Class for Basket -->
            <li id="lg-bag"><a class="<?php echo ($current_page == 'cart.php') ? 'active' : ''; ?>" href="cart.php"><i class="fas fa-basket-shopping" style="color: #000000;"></i></a></li>
            <a href="#" id="close"><i class="fas fa-times"></i></a>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.php"><i class="fas fa-basket-shopping" style="color: #000000;"></i></a>
        <i id="bar" class="fa fa-bars"></i>
    </div>
</header>

<script src="script2.js"></script>