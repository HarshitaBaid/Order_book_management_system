<?php
    session_start();
    include '../DatabaseConnection.php';
    $keys = implode(',',array_keys($_POST));
    $vals = array_values($_POST);

    function conversion($value){
        $value = array_map(
            function($x){
                return is_numeric($x)?$x:"'$x'";
            }, $value
        );
        return $value;
    };

    $proname = conversion($vals[6]);
    // print_r($vals[7]);
    $prodesc = conversion($vals[7]);
    $quantity = conversion($vals[8]);
    $price = conversion($vals[9]);
    $amount = conversion($vals[10]);
    $advance = conversion($vals[11]);
    $due = conversion($vals[12]);
    $user = $_SESSION['username'];

    for ($i=0; $i<count($proname); $i++){
        $qry = "insert into placeorder ($keys,username) values ('$vals[0]','$vals[1]','$vals[2]','$vals[3]','$vals[4]','$vals[5]',$proname[$i],$prodesc[$i],$quantity[$i],$price[$i],$amount[$i],$advance[$i],$due[$i],'$user');";
        echo $qry;

        $result = mysqli_query($your_db_connection, $qry);

        if (!$result) {
            die('Error in query: ' . mysqli_error($your_db_connection));
        }
        
    }
?>