<?php
    include './DatabaseConnection.php';
    $qry = "update account set password='".$_POST['password']."' where username='".$_POST['username']."' and email='".$_POST['email']."';";
    echo $qry;
    $res = mysqli_query($your_db_connection, $qry);
    if($res){
        echo 1;
    }

?>