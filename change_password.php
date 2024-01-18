<?php
session_start();
include './DatabaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $oldPassword = $_POST["old_password"];
    $newPassword1 = $_POST["n1"];
    $newPassword2 = $_POST["n2"];

    $user = $_SESSION['username'];

    $qry = "SELECT password FROM account WHERE username='$user';";
    $res = mysqli_query($your_db_connection, $qry);

    // Check if the query was successful
    if ($res) {
        $row = mysqli_fetch_assoc($res);
        $currentPassword = $row['password'];

        if ($newPassword1 != $newPassword2) {
            echo 2; // Passwords do not match
        } elseif ($currentPassword != $oldPassword) {
            echo 0; // Current password is incorrect
        } else {
            $updateQuery = "UPDATE account SET password='$newPassword1' WHERE username='$user';";
            $updateResult = mysqli_query($your_db_connection, $updateQuery);

            if ($updateResult) {
                echo 1; // Password update successful
            } else {
                echo 0; // Password update failed
            }
        }
    } else {
        echo 0; // Query failed
    }
} else {
    // Handle invalid requests
    echo "Invalid request!";
}
?>
