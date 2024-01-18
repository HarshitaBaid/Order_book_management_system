<?php
    session_start();
    include './DatabaseConnection.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["iddata"])) {
        $id = (int)$_POST['iddata'];
        $user = $_SESSION['username'];
        $qry = "delete from receiveorder where id=$id and username='$user';";
        $res = mysqli_query($your_db_connection, $qry);
        if ($res) {
            // Deletion was successful
            echo 1;
        } else {
            // Deletion failed
            echo 0;
        }
    }
?>