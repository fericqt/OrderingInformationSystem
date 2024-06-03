<?php

include_once('conf.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['idtrack'];
    $username = $_POST['username'];
    $usertype = $_POST['usertype'];

    $uQuery = "UPDATE tblusers SET Username = '$username', UserType = '$usertype' WHERE IdTrack = $id";
    $result = mysqli_query($conn, $uQuery);

    if ($result) {
        echo '1';
    } else {
        echo '0';
    }
}
