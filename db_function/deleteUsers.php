<?php

include_once('conf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];

    $dQuery = "DELETE FROM tblusers WHERE IdTrack = $id";
    $result = mysqli_query($conn, $dQuery);

    if ($result) {
        echo '1';
    } else {
        echo '0';
    }
}
