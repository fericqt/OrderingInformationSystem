<?php

include_once('conf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];

    $dQuery1 = "DELETE FROM tblorders WHERE IdTrack = $id";
    $dQuery2 = "DELETE FROM tblorderdetails WHERE OrderIdTrack = $id";
    $result1 = mysqli_query($conn, $dQuery1);
    $result2 = mysqli_query($conn, $dQuery2);

    if ($result1 && $result2) {
        echo '1';
    } else {
        echo '0';
    }
}
