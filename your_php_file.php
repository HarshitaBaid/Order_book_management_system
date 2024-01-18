<?php
session_start();
// your_php_file.php
include './DatabaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["pdesc"])) {
    $pdescValue = $_POST["pdesc"];
    $user = $_SESSION['username'];

    $qry = "SELECT id, fname, lname, proname, otype, item_desc, odate, ldate, amount, advance,due, status FROM receiveorder WHERE item_desc LIKE '%$pdescValue%' and username='$user';";
    $res = mysqli_query($your_db_connection, $qry);
    $response = "";
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $response .= "<tr class='order-row'>";
            $response .= "<td>". $row['id']. "</td>";
            $response .= "<td>" . $row['fname'] . "</td>";
            $response .= "<td>" . $row['proname'] . "</td>";
            $response .= "<td>" . $row['otype'] . "</td>";
            $response .= "<td>" . $row['item_desc'] . "</td>";
            $response .= "<td>" . $row['odate'] . "</td>";
            $response .= "<td>" . $row['ldate'] . "</td>";
            $response .= "<td>" . $row['amount'] . "</td>";
            $response .= "<td>" . $row['advance'] . "</td>";
            $response .= "<td>" . $row['due'] . "</td>";
            $response .= "<td>" . $row['status'] . "</td>";
            $response .= "<td><img src='./images/edit_icon.png'></td>";
            $response .= "<td><img src='./images/delete_icon.png'></td>";
            $response .= "</tr>";
        }
    } else {
        $response = "<tr class='no-results'><td colspan='9'>No results found</td></tr>";
    }

    echo $response;
} else {
    echo "Invalid request or pdesc value not received!";
}
?>
