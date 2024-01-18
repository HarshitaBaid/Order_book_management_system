<?php
    include './DatabaseConnection.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve data from the POST request
        $row1 = $_POST['fdp'];
        $query = "SELECT product_name FROM products";
        $result = mysqli_query($your_db_connection, $query);

        if (!$result) {
            die('Error in query: ' . mysqli_error($your_db_connection));
        }

        $productNames = array();
        // Fetch product names from the result set
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($productNames, $row['product_name']);
        }
        $new = array();
        foreach ($productNames as $option) {
            if ($option == $row1) {
                $new = array_merge(array($row1), $new);
            } else {
                array_push($new, $option);
            }
        }
        // Return the JSON response
        header('Content-Type: application/json');
        echo json_encode($new);
        exit;
    }
?>