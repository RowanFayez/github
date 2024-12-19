<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php'); // Redirect to login page if the user is not logged in
    exit();
}

require_once('php/CreateDb.php');
require_once('./php/component.php');

// Create instance of CreateDb class
$database = new CreateDb("login", "Productdb");

// Assuming the user ID is stored in the session
$user_id = $_SESSION['user_id']; // This assumes you have saved the user ID during login

// Hardcoded Products Array (you can leave this as is if products are already in the DB)
$products = [
    [
        'product_name' => 'Productone',
        'product_price' => 50,
        'product_image' => 'upload/productone.jpg',
    ],
    [
        'product_name' => 'Producttwo',
        'product_price' => 60,
        'product_image' => 'upload/producttwo.jpg',
    ],
    [
        'product_name' => 'Productthree',
        'product_price' => 70,
        'product_image' => 'upload/productthree.jpg',
    ],
    [
        'product_name' => 'Productfour',
        'product_price' => 100,
        'product_image' => 'upload/productfour.jpg',
    ],
    [
        'product_name' => 'Product5',
        'product_price' => 100,
        'product_image' => 'upload/product5.jpg',
    ],
    [
        'product_name' => 'Product6',
        'product_price' => 50,
        'product_image' => 'upload/product6.jpg',
    ],
    [
        'product_name' => 'Product7',
        'product_price' => 50,
        'product_image' => 'upload/product7.jpg',
    ],
    [
        'product_name' => 'Product8',
        'product_price' => 50,
        'product_image' => 'upload/product8.jpg',
    ],
    [
        'product_name' => 'Product9',
        'product_price' => 90,
        'product_image' => 'upload/product9.jpg',
    ],
    [
        'product_name' => 'Product10',
        'product_price' => 80,
        'product_image' => 'upload/product10.jpg',
    ],
    [
        'product_name' => 'Product11',
        'product_price' => 100,
        'product_image' => 'upload/product11.jpg',
    ],
    [
        'product_name' => 'Product12',
        'product_price' => 100,
        'product_image' => 'upload/product12.jpg',
    ],
    // [
    //     'product_name' => 'Product13',
    //     'product_price' => 70,
    //     'product_image' => 'upload/product13.jpg',
    // ]
];


// Insert products into the database if not already present
foreach ($products as $product) {
    $product_name = $product['product_name'];
    $product_price = $product['product_price'];
    $product_image = $product['product_image'];

    // Check if the product already exists in the database
    $sql_check = "SELECT * FROM Productdb WHERE product_name = '$product_name'";
    $result = mysqli_query($database->con, $sql_check);

    if (mysqli_num_rows($result) == 0) {
        // Insert the product if not found
        $sql = "INSERT INTO Productdb (product_name, product_price, product_image) 
                VALUES ('$product_name', '$product_price', '$product_image')";
        if (!mysqli_query($database->con, $sql)) {
            echo "<script>alert('Error adding product to the database.')</script>";
        }
    }
}

// Add Product to Cart in Database
if (isset($_POST['add'])) {
    $product_id = $_POST['product_id'];

    // Check if the user already has a cart
    $sql = "SELECT cart_id FROM carts WHERE user_id = $user_id";
    $result = mysqli_query($database->con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Cart exists, get the cart ID
        $cart = mysqli_fetch_assoc($result);
        $cart_id = $cart['cart_id'];
    } else {
        // Create a new cart if it doesn't exist
        $sql = "INSERT INTO carts (user_id) VALUES ($user_id)";
        if (mysqli_query($database->con, $sql)) {
            $cart_id = mysqli_insert_id($database->con);
        } else {
            echo "<script>alert('Error creating cart.')</script>";
            return;
        }
    }

    // Check if the item is already in the cart
    $sql_check = "SELECT * FROM cart_items WHERE cart_id = $cart_id AND product_id = $product_id";
    $result_check = mysqli_query($database->con, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Item already exists in the cart, don't update the quantity
        echo "<script>alert('This item is already in your cart!');</script>";
    } else {
        // Add the product to the cart if not already there
        $sql = "INSERT INTO cart_items (cart_id, product_id, quantity) 
                VALUES ($cart_id, $product_id, 1)";
        if (!mysqli_query($database->con, $sql)) {
            echo "<script>alert('Error adding product to cart.')</script>";
        } else {
            echo "<script>alert('Product has been added to your cart.')</script>";
        }
    }
}
?>

<!-- HTML and product display code goes here -->

<!doctype html>
<html lang="en">
        <link rel="icon" type="image/png" href="img/icon.jpg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link rel="stylesheet" href="style3.css">
        <!-- <link rel="stylesheet" href="styles.css"> -->

    <title>Product Page</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>
<body>


<?php require_once ("php/header.php"); ?>

<!-- Display Products -->
<!-- Display Products -->
<div class="container py-5">
    <div class="pro">
        <h2>Products Available</h2>
        <div class="pro-container"> 
            <div id="product1" class="row text-center py-5">
                <?php
                // Fetch products from the database and display them
                $sql = "SELECT * FROM Productdb";
                $result = mysqli_query($database->con, $sql);
                
                while ($row = mysqli_fetch_assoc($result)) {
                    // Display each product using the component function
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
                ?>
            </div>
        </div>
    </div>
</div>

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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf "crossorigin="anonymous"></script>
</body>
</html>