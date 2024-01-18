<?php
$host = 'localhost'; // Replace with your actual database host
$username = 'root'; // Replace with your actual database username
$password = ''; // Replace with your actual database password
$database = 'obook'; // Replace with your actual database name

// Create a connection to the database
$your_db_connection = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$your_db_connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
