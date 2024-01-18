<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include your database connection file here
include('../DatabaseConnection.php');

$query = "SELECT product_name FROM products";
$result = mysqli_query($your_db_connection, $query);

if (!$result) {
    die('Error in query: ' . mysqli_error($your_db_connection));
}

$productNames = array();

// Fetch product names from the result set
while ($row = mysqli_fetch_assoc($result)) {
    $productNames[] = $row['product_name'];
}

ob_end_clean();
header('Content-Type: application/json; charset=utf-8');

// Output the JSON string
echo json_encode($productNames);
?>
