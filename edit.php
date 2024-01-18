<?php
session_start();
include './DatabaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["iddata"])) {
    $id = (int)$_POST['iddata'];
    $ot = $_POST['ortype'];
    $user = $_SESSION['username'];

    if($ot=="sale"){
        $qry = "select fname, lname, phone, odate, address, otype, proname, item_desc, quantity, price, amount, advance, due, status from receiveorder where id=$id and username='$user';";
    }
    else if($ot=="manufacturer"){
        $qry = "select fname, lname, phone, odate, address, otype, proname, item_desc, ldate, quantity, price, amount, advance, due, status from receiveorder where id=$id and username='$user';";
    }
    else{
        $qry = "select fname, lname, phone, odate, address, otype, proname, item_desc, status, quantity, price, amount, advance, due, from_date, to_date from receiveorder where id=$id and username='$user';";
    }
    $res = mysqli_query($your_db_connection, $qry);

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Invalid request";
    }
}
?>
