<?php
session_start();

// Include the database class and components
require_once("php/CreateDb.php");
require_once("php/component.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Create a database instance
$db = new CreateDb("login", "Productdb");

// Get the user ID from session
$user_id = $_SESSION['user_id'];

// Fetch the user's cart ID
$sql = "SELECT cart_id FROM carts WHERE user_id = $user_id";
$result = mysqli_query($db->con, $sql);
if (mysqli_num_rows($result) > 0) {
    $cart = mysqli_fetch_assoc($result);
    $cart_id = $cart['cart_id'];
} else {
    echo "No cart found for this user.";
    exit();
}

// Fetch cart items
$cart_items = $db->getCartItems($cart_id);
$total = 0;

// Handle item removal
if (isset($_GET['remove'])) {
    $cart_item_id = $_GET['remove'];
    $db->removeFromCart($cart_item_id);  // Remove from cart in DB
    echo "<script>alert('Product has been removed from your cart!');</script>";
    echo "<script>window.location = 'cart.php';</script>"; // Refresh the page
}

// Update cart item quantity
if (isset($_POST['update_quantity'])) {
    $cart_item_id = $_POST['cart_item_id'];
    $new_quantity = $_POST['quantity'];
    $db->updateCartQuantity($cart_item_id, $new_quantity);  // Update quantity in DB
    echo "<script>window.location = 'cart.php';</script>"; // Refresh the page
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link rel="stylesheet" href="style3.css">

    <title>My Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="styles.css">
</head>

<body class="bg-light">


    <script src="script.js"></script>
    <?php require_once('php/header.php'); ?>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>

                    <?php
                    if ($cart_items && mysqli_num_rows($cart_items) > 0) {
                        while ($item = mysqli_fetch_assoc($cart_items)) {
                            $total += $item['product_price'] * $item['quantity'];
                            echo "
                            <div class='cart-item'>
                                <div class='row'>
                                    <div class='col-md-3'>
                                        <img src='" . $item['product_image'] . "' alt='" . $item['product_name'] . "' class='img-fluid'>
                                    </div>
                                    <div class='col-md-6'>
                                        <h6>" . $item['product_name'] . "</h6>
                                        <p>Price: $" . $item['product_price'] . "</p>
                                    </div>
                                    <div class='col-md-3'>
                                        <form action='cart.php' method='post'>
                                            <input type='hidden' name='cart_item_id' value='" . $item['cart_item_id'] . "'>
                                            <input type='number' name='quantity' value='" . $item['quantity'] . "' min='1' max='99' class='form-control mb-2' style='width: 60px;'>
                                            <button type='submit' name='update_quantity' class='btn btn-warning'>Update</button>
                                        </form>
                                        <br>
                                        <a href='cart.php?remove=" . $item['cart_item_id'] . "' class='btn btn-danger'>Remove</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            ";
                        }
                    } else {
                        echo "<h5>Your cart is empty!</h5>";
                    }
                    ?>

                </div>
            </div>

            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <h6>Price (<?php echo mysqli_num_rows($cart_items); ?> items)</h6>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$<?php echo number_format($total, 2); ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<?php echo number_format($total, 2); ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="checkout.php" class="btn btn-primary btn-block">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
