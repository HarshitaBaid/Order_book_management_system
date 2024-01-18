<?php
include './DatabaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the product name from the Ajax request
    $productName = $_POST["product_name"];
    $ch = $_POST["ch_product"];

    // Perform the database query to insert the product name
    $insertQuery = "update products set product_name='$ch' where product_name='$productName';";
    
    if (mysqli_query($your_db_connection, $insertQuery)) {
        echo 1;
    } else {
        echo 0;
    }
    
    // Close the database connection
    mysqli_close($your_db_connection);
}
?>
