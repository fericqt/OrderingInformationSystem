<!DOCTYPE html>
<html lang="en">

<?php include "../../inc/header.php"; ?>

<body>

    <?php include "../../inc/sidebar.php"; ?>
    <?php include "../../inc/topbar.php"; ?>

    <div class="content">
        <h1 class="mb-4">Item Management</h1>

        <div class="table-responsive">
            <table id="userTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "../../db_function/conf.php";

                    $query = "SELECT * FROM tblitems";
                    $result = mysqli_query($conn, $query);

                    // Display users in table rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>" . $row['Price'] . "</td>";
                        echo "<td>" . $row['Date'] . "</td>";
                        echo "<td>";
                        echo '<a href="#" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editUserModal" data-id="' . $row['IdTrack'] . '">Edit</a>';
                        echo '<a href="../../db_function/delete_user.php?id=' . $row['IdTrack'] . '" class="btn btn-danger ml-1" onclick="return confirm(\'Are you sure you want to delete this user?\')">Delete</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
</body>
<?php include "../../inc/script.php"; ?>

</html>