<?php

include_once('conf.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];
    $cdate = date('Y-m-d');

    $iQuery = "INSERT INTO tblusers (Username, Password, UserType, DateRegistered) VALUES ('$username', '$password', '$usertype', '$cdate')";
    $result = mysqli_query($conn, $iQuery);

    if ($result) {
        echo '1';
    } else {
        echo '0';
    }
}
