<?php
session_start();

include_once('conf.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = $_POST['formData'];
    parse_str($formData, $formArray);
    //
    $userIdTrack = $_SESSION["userIdTrack"];
    $orderItems = $_POST['orderItems'];
    $remarks = $formArray['remarks'];
    $status = "OnQueue";
    $processBy = "";
    $dateOrdered = date("Y-m-d h:i A");
    $dateProcessed = "";
    $total = 0;
    //calculate overall total
    foreach ($orderItems as $item) {
        $total += $item['Total'];
    }

    $orderIdTrack = 0;

    $iQuery = "INSERT INTO tblorders (UserIdTrack, Total, Payment, PaymentChange, Remarks, Status, ProcessBy, DateOrdered, DateProcessed) 
               VALUES ('$userIdTrack', '$total', 0, 0, '$remarks', '$status', '$processBy', '$dateOrdered', '$dateProcessed')";
    $result = mysqli_query($conn, $iQuery);
    if ($result) {
        $maxQuery = "SELECT MAX(IdTrack) AS ID FROM tblorders WHERE UserIdTrack = $userIdTrack";
        $maxRes = $conn->query($maxQuery);
        if ($maxRes->num_rows > 0) {
            $row = $maxRes->fetch_assoc();
            $orderIdTrack = $row['ID'];
        } else {
            $orderIdTrack = null;
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    // Process the order items
    foreach ($orderItems as $item) {
        $itemIdTrack = $item['ItemIdTrack'];
        $itemName = $item['ItemName'];
        $price = $item['Price'];
        $qty = $item['Qty'];
        $total = $item['Total'];

        $iQuery1 = "INSERT INTO tblorderdetails (OrderIdTrack, ItemIdTrack, ItemName, Price, Qty, Total) 
               VALUES ('$orderIdTrack', '$itemIdTrack', '$itemName', '$price', '$qty', '$total')";
        $result = mysqli_query($conn, $iQuery1);
    }
    echo '1';
}
