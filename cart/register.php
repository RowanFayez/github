<?php
session_start();
include "connect.php"; 
 // Ensure the database connection is successful
 require_once("php/CreateDb.php");

 $db = new CreateDb("login", "Productdb");

// Registration process
if (isset($_POST["signup"])) {
    $fullname = $_POST["FNAME"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // Plain text password
    $password=md5($password);
    // Check if the email already exists in the database
    $checkmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkmail);

    if ($result->num_rows > 0) {
        echo "Email already exists";  // If the email is already registered
    } else {
        // Insert the new user into the database with plain text password
        $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header("Location: index.php");  // Redirect to the login page after successful registration
            exit(); // Stop further execution after redirection
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;  // Display any errors
        }
    }
}

// Login process
if (isset($_POST["signin"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];  // Plain text password entered by the user
    $password=md5($password) ;
    // Query to check if the email exists in the database
    $sqlquery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sqlquery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];  // Get the stored plain text password from the database

        // Compare the entered password with the stored password
        if ($password == $stored_password) {
            $_SESSION['email'] = $row['email']; 
            $_SESSION['user_id'] = $row['id']; // Assuming `id` is the primary key for users

            // Create or retrieve the user's cart
            $user_id = $_SESSION['user_id'];
            $cart_query = "SELECT cart_id FROM carts WHERE user_id = '$user_id'";
            $cart_result = $conn->query($cart_query);

            if ($cart_result->num_rows == 0) {
                // Create a new cart if one doesn't exist
                $create_cart = "INSERT INTO carts (user_id) VALUES ('$user_id')";
                if (!$conn->query($create_cart)) {
                    echo "Error creating cart: " . $conn->error;
                }
            } // Store email in session
            header('Location: home.php');    // Redirect to homepage
            exit();
        } else {
            echo "Incorrect password";  // Incorrect password
        }
    } else {
        echo "Incorrect email";  // Email does not exist in the database
    }
}
?>