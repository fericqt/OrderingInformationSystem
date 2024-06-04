<?php

include_once('conf.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $query = "SELECT * FROM tblorderdetails WHERE OrderIdTrack = '$id'";
    $result = mysqli_query($conn, $query);

    // Display order details in table rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['ItemName'] . "</td>";
        echo "<td>" . $row['Price'] . "</td>";
        echo "<td>" . $row['Qty'] . "</td>";
        echo "<td>" . $row['Total'] . "</td>";
        echo "</tr>";
    }
}
