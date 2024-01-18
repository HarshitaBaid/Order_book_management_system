<?php
    session_start();
    include '../DatabaseConnection.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $otype = conversion($vals[5]);
    $proname = conversion($vals[6]);
    $prodesc = conversion($vals[7]);
    $last_date = conversion($vals[8]);
    $quantity = conversion($vals[9]);
    $price = conversion($vals[10]);
    $amount = conversion($vals[11]);
    $advance = conversion($vals[12]);
    $due = conversion($vals[13]);
    $from_date = conversion($vals[14]);
    $to_date = conversion($vals[15]);
    $keys .= ",status";
    $user = $_SESSION['username'];
    
    for ($i=0; $i<count($proname); $i++){
        $response = $otype[$i];
        if($otype[$i]!=="'manufacturer'"){
            $qry = "insert into receiveorder ($keys,username) values ('$vals[0]','$vals[1]','$vals[2]','$vals[3]','$vals[4]',$otype[$i],$proname[$i],$prodesc[$i],$last_date[$i],$quantity[$i],$price[$i],$amount[$i],$advance[$i], $due[$i],$from_date[$i],$to_date[$i],'Completed','$user');";
        }
        else{
            $qry = "insert into receiveorder ($keys,username) values ('$vals[0]','$vals[1]','$vals[2]','$vals[3]','$vals[4]',$otype[$i],$proname[$i],$prodesc[$i],$last_date[$i],$quantity[$i],$price[$i],$amount[$i],$advance[$i], $due[$i],$from_date[$i],$to_date[$i],'Pending','$user');";
        }

        $result = mysqli_query($your_db_connection, $qry);
        if (!$result) {
            // Handle the error if needed
            echo json_encode(['success' => false, 'message' => 'Form submission failed.']);
            exit;
        }
    }
        // Return a success message
        echo json_encode(['success' => true, 'message' => "Form submitted successfully."]);
        exit;
}
?>