<?php

include_once('conf.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['IdTrack'];
    $payment = $_POST['Payment'];
    $change = $_POST["Change"];

    $uQuery = "UPDATE tblorders SET Payment = $payment, PaymentChange = $change WHERE IdTrack = $id";
    $result = mysqli_query($conn, $uQuery);

    if ($result) {
        echo '1';
    } else {
        echo '0';
    }
}
