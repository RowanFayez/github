<!DOCTYPE html>
<html lang="en">
    <link rel="icon" type="image/png" href="img/icon.jpg">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Updated Font Awesome 6 Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link rel="stylesheet" href="style3.css">
</head>
<body>

<!-- <header id="header">
        <a href="#"><i class="fas fa-tshirt" style="color: #000000;"></i></a>

        <div>
           <ul id="navbar">
            <li><a class="active" href="index.php">Home</a></li>
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


<section id="Page-header" class="about-header">

<h2>#Let Us Talk</h2>

<p>LEAVE A MESSAGE, We love to hear from you!</p>

</section>

<section id="contact-details" class="section-p1">
    <div class="details">
        <span>GET IN TOUCH</span>
        <h2>Visit one of our agency locations or contact us today</h2>
        <h3>Head Office</h3>
        <div>
            <li>
                <i class="fas fa-map"></i>
                <p>Alex-Egypt Ezbat saad City</p>
            </li>
            <li>
                <i class="far fa-envelope"></i>
                <p>rawnaq@gmail.com</p>
            </li>
            <li>
                <i class="fas fa-phone-alt"></i>
                <p>+20 01201380604</p>
            </li>
            <li>
                <i class="far fa-clock"></i>
                <p>Monday to Saturday:9.00am to 16.pm</p>
            </li>
        </div>
    </div>

<div  class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13649.397611755074!2d29.95905380124909!3d31.21104784181368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f5c497a34ca70f%3A0xa94e39846c210d68!2z2LnYstio2Kkg2LPYudiv2Iwg2YLYs9mFINiz2YrYr9mJINis2KfYqNix2Iwg2YXYrdin2YHYuNipINin2YTYpdiz2YPZhtiv2LHZitip!5e0!3m2!1sar!2seg!4v1734395230801!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

    </section>

<section id="form-details">
<form id="contact-form" onsubmit="return validateForm()">
        <span>LEAVE A MESSAGE</span>
        <h2>We love to hear from you</h2>
        <input type="text" id="name" placeholder="Your Name" required>
        <input type="email" id="email" placeholder="E-mail" required>
        <input type="text" id="subject" placeholder="Subject" required>
        <textarea id="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
        <button type="submit" class="normal">Submit</button>
        <div id="feedback-message"></div>
    </form>

    <div class="people">
        <div>
            <img src="img/people/user1.png" alt="">
            <p><span>Mohammed Ali</span> Senior Marketing Manager <br> Phone:  +20 01234567891<br> E-mail: MohammedAlirawnaq@gmail.com</p>
        </div>
        <div>
            <img src="img/people/user2.jpg" alt="">
            <p><span>Mahmoud Fathi</span> Senior PR Manager <br> Phone:  +20 01234567891<br> E-mail: MahmoudFathirawnaq@gmail.com</p>
        </div>
        <div>
            <img src="img/people/user3.jpg" alt="">
            <p><span>Mariam Sayed</span> Senior Media Manager <br> Phone:  +20 01234567891<br> E-mail: MariamSayedrawnaq@gmail.com</p>
        </div>
    </div>
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
        <a href = "signin.html">Sign In</a>
        <a href = "signin.html">Sign Up</a>
        <a href = "signin.html">Log Out</a>
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