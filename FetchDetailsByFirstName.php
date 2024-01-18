<?php
// FetchDetailsByFirstName.php
session_start();
include './DatabaseConnection.php';

$firstName = $_GET['firstName'];
$user = $_SESSION['username'];

// Use a SELECT query with a WHERE clause to filter by the first name
$query = "SELECT lname, phone, address FROM placeorder WHERE fname = ? and username='$user';";
$stmt = $your_db_connection->prepare($query);

// Check if the prepare statement was successful
if ($stmt) {
    $stmt->bind_param("s", $firstName);
    $stmt->execute();
    $stmt->bind_result($lname, $phone, $address);
    $stmt->fetch();
    $stmt->close();

    // Return details as JSON
    echo json_encode(array('lname' => $lname, 'phone' => $phone, 'address' => $address));
} else {
    // Handle the case where the prepare statement fails
    echo json_encode(array('error' => 'Prepare statement failed'));
}
?>
