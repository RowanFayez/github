<?php

class CreateDb
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

    // Class constructor
    public function __construct(
        $dbname = "login", // Use the existing database name
        $tablename = "Productdb",
        $servername = "localhost",
        $username = "root",
        $password = ""
    ) {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        // Create connection to the existing database
        $this->con = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$this->con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Ensure necessary tables are created on startup
        $this->createProductTable();
        $this->createCartTable();
        $this->createCartItemsTable();
    }

    // Method to create the product table
    private function createProductTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS $this->tablename (
                    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    product_name VARCHAR(25) NOT NULL,
                    product_price FLOAT,
                    product_image VARCHAR(100)
                );";

        if (!mysqli_query($this->con, $sql)) {
            echo "Error creating table: " . mysqli_error($this->con);
        }
    }

    public function getData()
    {
        $sql = "SELECT * FROM $this->tablename";
        $result = mysqli_query($this->con, $sql);
        
        // Check if query execution was successful
        if (!$result) {
            echo "Error in query: " . mysqli_error($this->con); // Display error message from MySQL
            return false;
        }

        // Check if data exists
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            echo "No data found.<br>";
            return false;
        }
    }

    public function createCartTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS carts (
            cart_id INT(11) AUTO_INCREMENT PRIMARY KEY,
            user_id INT(11) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );";
        if (!mysqli_query($this->con, $sql)) {
            echo "Error creating carts table: " . mysqli_error($this->con);
        }
    }

    // Create table for cart items
    public function createCartItemsTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS cart_items (
            cart_item_id INT(11) AUTO_INCREMENT PRIMARY KEY,
            cart_id INT(11) NOT NULL,
            product_id INT(11) NOT NULL,
            quantity INT DEFAULT 1,
            added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (cart_id) REFERENCES carts(cart_id) ON DELETE CASCADE
        );";
        if (!mysqli_query($this->con, $sql)) {
            echo "Error creating cart_items table: " . mysqli_error($this->con);
        }
    }

    public function addToCart($user_id, $product_id, $quantity = 1)
    {
        // Check if user already has a cart
        $sql = "SELECT cart_id FROM carts WHERE user_id = $user_id";
        $result = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $cart = mysqli_fetch_assoc($result);
            $cart_id = $cart['cart_id'];
        } else {
            // Create new cart if not exists
            $sql = "INSERT INTO carts (user_id) VALUES ($user_id)";
            if (mysqli_query($this->con, $sql)) {
                $cart_id = mysqli_insert_id($this->con);
            } else {
                echo "Error creating cart: " . mysqli_error($this->con);
                return;
            }
        }

        // Add item to cart_items table
        $sql = "INSERT INTO cart_items (cart_id, product_id, quantity) VALUES ($cart_id, $product_id, $quantity)";
        if (!mysqli_query($this->con, $sql)) {
            echo "Error adding item to cart: " . mysqli_error($this->con);
        }
    }

    // Remove item from cart
    public function removeFromCart($cart_item_id)
    {
        $sql = "DELETE FROM cart_items WHERE cart_item_id = $cart_item_id";
        if (!mysqli_query($this->con, $sql)) {
            echo "Error removing item from cart: " . mysqli_error($this->con);
        }
    }

    public function getCartItems($cart_id)
    {
        $sql = "SELECT ci.cart_item_id, p.id AS product_id, p.product_name, 
                   p.product_price, p.product_image, ci.quantity
            FROM cart_items ci
            JOIN Productdb p ON ci.product_id = p.id
            WHERE ci.cart_id = ?";
        
        $stmt = $this->con->prepare($sql);

        if ($stmt === false) {
            die("Error preparing statement: " . $this->con->error);
        }

        $stmt->bind_param("i", $cart_id); // Bind the cart_id parameter
        $stmt->execute(); // Execute the query
        $result = $stmt->get_result(); // Fetch the result
        return $result; // Return the result set
    }

    public function updateCartQuantity($cart_item_id, $new_quantity)
    {
        $sql = "UPDATE cart_items SET quantity = $new_quantity WHERE cart_item_id = $cart_item_id";
        if (!mysqli_query($this->con, $sql)) {
            echo "Error updating quantity: " . mysqli_error($this->con);
        }
    }
}