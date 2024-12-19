<!DOCTYPE html>
<html lang="en">
    <link rel="icon" type="image/png" href="img/icon.jpg">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
           <li id="lg-bag"><a href="cart.html"><i class="fas fa-basket-shopping" style="color: #000000;"></i></a></li>  
           <a href="#" id="close"><i class="fas fa-times"></i></a>
          </ul>
       </div>
       <div id="mobile">     
           <a href="cart.php"><i class="fas fa-basket-shopping" style="color: #000000;"></i></a>
           <i id="bar" class="fa fa-bars"></i>
           </ul>
        </div> --> 
        <?php require_once('php/header.php'); ?>
    <section id="page-header" class="about-header">
        <h2>#Know Us</h2>
        <p>Discover our mission and values driving innovation.</p>
    </section>
    
    <section id="about-head" class="section-p1">
        <img src="assets/a6.jpg" alt="">
        <div>
            <h2>Who We Are?</h2>
            <p>
                At Rawnaq, we are passionate about creating stylish,
                comfortable, and high-quality clothing for every occasion. 
                Our mission is to empower individuals through fashion that combines modern trends with timeless designs.
                We are dedicated to providing pieces that inspire confidence and elevate your wardrobe,
                all while maintaining sustainability and ethical practices.  
            </p>
           <abbr title="">Thank you for choosing us to be a part of your style journey!</abbr> 
           <br><br>
           <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%">Create the perfect balance of style and comfort with every outfit.</marquee>
        </div>
    </section>

    <section id="about-website" class="section-p1">
        <h2>Our Aim: Style Made Simple</h2>
        <div class="video">
            <video autoplay muted loop src="assets/animation.mov"></video>
            <p>Our goal is to make fashion accessible and effortless, bringing your favorite clothing right to your home with a seamless online experience.</p>
        </div>
    </section>

    <section id="table" class="section-p1">
        <h2>Size Guide</h2>
        <div class="content">
            <div class="text">
                <p>Use our size guide to find your perfect fit. Simply measure yourself and match your measurements to the table. If you're between sizes, consider sizing up for added comfort.</p>
            </div>
            <table class="measurement-table">
                <thead>
                    <tr>
                        <th>Size</th>
                        <th>Chest (inches)</th>
                        <th>Waist (inches)</th>
                        <th>Hips (inches)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Small</td>
                        <td>34-36</td>
                        <td>28-30</td>
                        <td>36-38</td>
                    </tr>
                    <tr>
                        <td>Medium</td>
                        <td>38-40</td>
                        <td>32-34</td>
                        <td>40-42</td>
                    </tr>
                    <tr>
                        <td>Large</td>
                        <td>42-44</td>
                        <td>36-38</td>
                        <td>44-46</td>
                    </tr>
                    <tr>
                        <td>Extra Large</td>
                        <td>46-48</td>
                        <td>40-42</td>
                        <td>48-50</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section id="milestone-container" class="section-p1">
        <div class="milestones">
            <h2>Our Milestones</h2>
            <ol>
                <li>2018 - Founded Rawnaq</li>
                <li>2019 - Launched our first clothing collection</li>
                <li>2020 - Opened our first flagship store</li>
                <li>2021 - Introduced sustainable production practices</li>
                <li>2023 - Expanded to international markets</li>
            </ol>
        </div>

        <!-- Right: Video Section -->
        <div class="milestone-video">
            <video controls>
                <source src="assets/Milstones.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
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



    <script src="script2.js"></script>
</body>
</html>