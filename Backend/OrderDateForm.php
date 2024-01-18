<?php
session_start();
include '../DatabaseConnection.php';

if(isset($_POST['from_order_date']) || isset($_POST['fixed_order_date']) || isset($_POST['to_order_date'])) {
    extract($_POST);

    if($from_order_date=="" && $fixed_order_date==""){
        $qry = "select id, fname,lname,proname,otype,item_desc,odate,ldate,amount,advance,due,status from receiveorder where odate <= '$to_order_date' and username='".$_SESSION['username']."';";
    }
    else if($to_order_date=="" && $fixed_order_date==""){
        $qry = "select id, fname,lname,proname,otype,item_desc,odate,ldate,amount,advance,due,status from receiveorder where odate >= '$from_order_date' and username='".$_SESSION['username']."';";
    }
    else if($to_order_date=="" && $from_order_date==""){
        $qry = "select id, fname,lname,proname,otype,item_desc,odate,ldate,amount,advance,due,status from receiveorder where odate = '$fixed_order_date' and username='".$_SESSION['username']."';";
    }
    else{
        $qry = "select id, fname,lname,proname,otype,item_desc,odate,ldate,amount,advance,due,status from receiveorder where odate BETWEEN '$from_order_date' AND '$to_order_date' and username='".$_SESSION['username']."';";
    }

    $res = mysqli_query($your_db_connection, $qry);

    if (!$res) {
        die('Error in query: ' . mysqli_error($your_db_connection));
    }
    
    $response = "";
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $response .= "<tr class='order-row'>";
            $response .= "<td>" . $row['id']. "</td>";
            $response .= "<td>" . $row['fname']. $row['lname'] . "</td>";
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
    echo "<tr class='no-results'><td colspan='9'>No data received</td></tr>";
}
?>
