<?php
include './DatabaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the product name from the Ajax request
    $productName = $_POST["product_name"];

    // Perform the database query to insert the product name
    $insertQuery = "INSERT INTO products (product_name) VALUES ('$productName')";
    
    if (mysqli_query($your_db_connection, $insertQuery)) {
        echo 1;
    } else {    
        echo 0;
    }
    
    // Close the database connection
    mysqli_close($your_db_connection);
}
?>
