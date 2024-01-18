<?php
    include './DatabaseConnection.php';
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["iddata"])) {
        $id = (int)$_POST['iddata'];
        // Access the array data
        $data = $_POST['fd'];
        if($_POST['dtot']=="manufacturer"){
            // array_pop($data);
        }
        $ar = array();
        // Loop through the array and handle the data
        foreach ($data as $key => $value) {
            $ar[$key] = $value;
            // Perform any necessary operations with $key and $value
        }
        $keys = implode(',',array_keys($ar));
        $array_difference = array();
        $qry = "select $keys from receiveorder where id=$id;";
        $res = mysqli_query($your_db_connection, $qry);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                foreach ($ar as $key => $value) {
                    if ($value != $row[$key]) {
                        $array_difference[$key] = $value;
                    }
                }
            if (!empty($array_difference)) {
                $update_fields = array();
                foreach ($array_difference as $key => $value) {
                    $update_fields[] = "$key = " . (is_numeric($value) ? $value : "'$value'");
                }
                $update_query = "UPDATE receiveorder SET " . implode(', ', $update_fields) . " WHERE id = $id;";
                echo $update_query;
                mysqli_query($your_db_connection, $update_query);

                echo 1;
            } else {
                echo 0;
            }
        }
        } else {
            echo "not found";
        }
    }
?>
