<?php

include_once('conf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Id = $_POST['id'];

    $sQuery = "SELECT * FROM tblitems WHERE IdTrack = $Id";
    $result = mysqli_query($conn, $sQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $item = mysqli_fetch_assoc($result);
        echo json_encode($item);
    } else {
        echo json_encode(['error' => 'Item not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
