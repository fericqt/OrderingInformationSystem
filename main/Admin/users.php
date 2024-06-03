<!DOCTYPE html>
<html lang="en">

<?php include "../../inc/header.php"; ?>

<body>

    <?php include "../../inc/sidebar.php"; ?>
    <?php include "../../inc/topbar.php"; ?>

    <div class="content">
        <h1 class="mb-4">Users Management</h1>
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-item">Add New Users</button>
        </div>
        <div class="table-responsive">
            <table id="items-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>User Type</th>
                        <th>Date Registered</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "../../db_function/conf.php";

                    $query = "SELECT * FROM tblusers";
                    $result = mysqli_query($conn, $query);

                    // Display users in table rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Username'] . "</td>";
                        echo "<td>" . $row['UserType'] . "</td>";
                        echo "<td>" . $row['DateRegistered'] . "</td>";
                        echo "<td>";
                        echo '<a type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#edit-item" data-id="' . $row['IdTrack'] . '">Edit</a>';
                        echo '<a type="button" class="btn btn-danger delete-btn" data-id="' . $row['IdTrack'] . '">Delete</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Add item Modal -->
    <div class="modal fade" id="add-item" tabindex="-1" role="dialog" aria-labelledby="add-item-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-item-label">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-item-form" method="post">
                        <div class="form-group">
                            <label for="Username">Username:</label>
                            <input type="text" class="form-control" id="Username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="Password">Password:</label>
                            <input type="password" class="form-control" id="Password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="UserType" class="form-label">User Type</label>
                            <select id="UserType" name="usertype" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Client">Client</option>
                                <option value="Chef">Chef</option>
                            </select>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit item Modal -->
    <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="edit-item-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-item-label">Edit Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-item-form" method="post">
                        <div class="form-group">
                            <label for="Username">Username:</label>
                            <input type="text" class="form-control" id="EditUsername" name="username" required>
                            <input hidden type="text" id="EditIdTrack" name="idtrack" required>
                        </div>
                        <div class="form-group">
                            <label for="UserType" class="form-label">User Type</label>
                            <select id="EditUserType" name="usertype" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Client">Client</option>
                                <option value="Chef">Chef</option>
                            </select>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Users</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include "../../inc/script.php"; ?>
<script>
    $(document).ready(function() {
        $('#add-item-form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '../../db_function/createAccount.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response === '1') {
                        alert("New user added successfully!");
                        window.location.reload();
                    } else {
                        alert("There was an error encountered during adding of new user. Please try again later!");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('#edit-item-form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '../../db_function/editUser.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response === '1') {
                        alert("User updated successfully!");
                        window.location.reload();
                    } else {
                        alert("There was an error encountered during update of the User. Please try again later!");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('#items-table').on('click', '.edit-btn', function() {
            var Id = $(this).data('id');
            $.ajax({
                url: '../../db_function/getUser.php',
                type: 'POST',
                data: {
                    id: Id
                },
                success: function(response) {
                    var item = JSON.parse(response);
                    $('#EditUsername').val(item.Username);
                    $('#EditUserType').val(item.UserType);
                    $('#EditIdTrack').val(item.IdTrack);
                    $('#edit-item').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('#items-table').on('click', '.delete-btn', function() {
            var Id = $(this).data('id');
            if (confirm("Are you sure to delete this users?")) {
                $.ajax({
                    url: '../../db_function/deleteUsers.php',
                    type: 'POST',
                    data: {
                        id: Id
                    },
                    success: function(response) {
                        if (response === '1') {
                            alert("User deleted successfully!");
                            window.location.reload();
                        } else {
                            alert("There was an error encountered during deletion of the user. Please try again later!");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

    });
</script>

</html>