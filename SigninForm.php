<?php
    session_start();
    include "./DatabaseConnection.php";
    $username = "";
    $company_name = "";

    // print_r($_POST);
    if($_POST['email']==="" || $_POST['password']===""){
        echo 2;
    }
    $qry = "select username, company_name from account where email='$_POST[email]' and password='$_POST[password]';";
    $result = mysqli_query($your_db_connection, $qry);
    if(!$result){
        echo 0;
    }
    while ($row = $result->fetch_assoc()){
        // if($row['username']=="")
            echo "hi";
            print_r($row);
            $_SESSION['username'] = $row['username'];
            $_SESSION['company_name'] = $row['company_name'];
    }
        // echo "<script>window.location.href='./Dashboard.php?';</script>;";
    
?>
