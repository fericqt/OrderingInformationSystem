<?php

include_once('conf.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['ItemName'];
    $price = $_POST['ItemPrice'];
    $cdate = date('Y-m-d');

    $iQuery = "INSERT INTO tblitems (Name, Price, Date) VALUES ('$item', '$price', '$cdate')";
    $result = mysqli_query($conn, $iQuery);

    if ($result) {
        echo '1';
    } else {
        echo '0';
    }
}
