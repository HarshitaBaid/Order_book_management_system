<?php
    session_start();
    include "./DatabaseConnection.php";

    $user = $_SESSION['username'];
    $qry = "select username, company_name, address, email, phone from account where username='$user';";
    $result = mysqli_query($your_db_connection, $qry);
    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Fetch user details
        $row = $result->fetch_assoc();

        // Return user data as JSON response
        header('Content-Type: application/json');
        echo json_encode($row);
    } else {
        // Handle case where username is not found
        echo "User not found";
    }
?>