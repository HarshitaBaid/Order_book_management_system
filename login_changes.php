<?php
    session_start();
    include './DatabaseConnection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = $_POST;
        $user = $_SESSION['username'];
        // print_r($data);
        $array_difference = array();
        $qry = "select username, company_name, address, email, phone from account where username='".$_SESSION['username']."';";
        $res = mysqli_query($your_db_connection, $qry);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                foreach ($data as $key => $value) {
                    if ($value != $row[$key]) {
                        $array_difference[$key] = $value;
                    }
                }
            if (!empty($array_difference)) {
                $update_fields = array();
                foreach ($array_difference as $key => $value) {
                    $update_fields[] = "$key = " . (is_numeric($value) ? $value : "'$value'");
                }
                $update_query = "UPDATE account SET " . implode(', ', $update_fields) . " WHERE username = '$user';";
                mysqli_query($your_db_connection, $update_query);

                echo 1;
            } else {
                echo 1;
            }
        }
        
    } else {
        // Handle cases where the form data is not submitted via POST
        echo 0;
    }
}
    
?>