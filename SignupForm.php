<?php
    include './DatabaseConnection.php';
    // print_r($_POST);
    $key = implode(',',array_keys($_POST));
    $value = array_values($_POST);
    $value = implode(',',array_map(
        function($x){
            return is_numeric($x)?$x:"'$x'";
        }, $value
    ));
    $qry = "insert into account ($key) values ($value);";
    $res = mysqli_query($your_db_connection, $qry);
    if (!$res) {
        die('Error in query: ' . mysqli_error($your_db_connection));
    }
    else{
        echo "<script>window.location.href='./Login.php';</script>;";
    }
?>