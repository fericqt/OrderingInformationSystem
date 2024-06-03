<?php

include_once('conf.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['IdTrack'];
    $item = $_POST['ItemName'];
    $price = $_POST['ItemPrice'];
    $cdate = date('Y-m-d');

    $uQuery = "UPDATE tblitems SET Name = '$item', Price = '$price', Date = '$cdate' WHERE IdTrack = $id";
    $result = mysqli_query($conn, $uQuery);

    if ($result) {
        echo '1';
    } else {
        echo '0';
    }
}
