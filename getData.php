<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'DatabaseConnection.php';
$user = $_SESSION['username'];
// SQL query to get data (replace 'your_table_name' and 'your_column_names' accordingly)
$sql = "SELECT MONTHNAME(odate) AS result, COUNT(id) AS records FROM receiveorder where username='$user' GROUP BY MONTHNAME(odate);";

$result = mysqli_query($your_db_connection, $sql);

$data = [];

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $data[$row["result"]] = $row["records"];
    }
}

// Convert data to JSON format and send to the client
echo json_encode($data);
?>