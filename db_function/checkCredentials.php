<?php

session_start();

include_once('conf.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sQuery = "SELECT * FROM tblusers WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $sQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION["userName"] = $row["Username"];
        $_SESSION["userIdTrack"] = $row["IdTrack"];
        $_SESSION["userType"] = $row["UserType"];


        if ($row["UserType"] === "Admin") {
            echo '1';
        } else if ($row["UserType"] === "Client") {
            echo '2';
        } else {
            echo '3';
        }
    } else {
        echo '0';
    }
}
