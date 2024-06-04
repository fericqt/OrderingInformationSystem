<?php

include_once('conf.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['IdTrack'];
    $status = $_POST['Status'];
    $username = $_SESSION["userName"];
    $date = date("Y-m-d h:i A");

    $uQuery = "UPDATE tblorders SET Status = '$status', ProcessBy = '$username', DateProcessed = '$date' WHERE IdTrack = $id";
    $result = mysqli_query($conn, $uQuery);

    if ($result) {
        echo '1';
    } else {
        echo '0';
    }
}
