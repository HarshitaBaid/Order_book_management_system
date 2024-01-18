<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the POST request
    $row = $_POST['fds'];
    $statusOptions = array("Completed", "Pending", "Progress");
    $new = array();

    foreach ($statusOptions as $option) {
        if ($option == $row) {
            $new = array_merge(array($row), $new);
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
