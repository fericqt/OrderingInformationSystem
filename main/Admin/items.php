<!DOCTYPE html>
<html lang="en">

<?php include "../../inc/header.php"; ?>

<body>

    <?php include "../../inc/sidebar.php"; ?>
    <?php include "../../inc/topbar.php"; ?>

    <div class="content">
        <h1 class="mb-4">Item Management</h1>
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-item">Add New Item</button>
        </div>
        <div class="table-responsive">
            <table id="items-table" class="table table-bordered">
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
                    <h5 class="modal-title" id="add-item-label">Add New Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-item-form" method="post">
                        <div class="form-group">
                            <label for="ItemName">Item Name:</label>
                            <input type="text" class="form-control" id="ItemName" name="ItemName" required>
                        </div>
                        <div class="form-group">
                            <label for="ItemPrice">Item Price:</label>
                            <input type="number" step="0.01" class="form-control" id="ItemPrice" name="ItemPrice" required>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Item</button>
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
                    <h5 class="modal-title" id="edit-item-label">Edit Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-item-form" method="post">
                        <div class="form-group">
                            <label for="ItemName">Item Name:</label>
                            <input type="text" class="form-control" id="EditItemName" name="ItemName" required>
                            <input hidden type="text" id="EditIdTrack" name="IdTrack">
                        </div>
                        <div class="form-group">
                            <label for="ItemPrice">Item Price:</label>
                            <input type="number" step="0.01" class="form-control" id="EditItemPrice" name="ItemPrice" required>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Item</button>
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
                url: '../../db_function/addItem.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response === '1') {
                        alert("New item added successfully!");
                        window.location.reload();
                    } else {
                        alert("There was an error encountered during adding of new item. Please try again later!");
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
                url: '../../db_function/editItem.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response === '1') {
                        alert("Item updated successfully!");
                        window.location.reload();
                    } else {
                        alert("There was an error encountered during update of the item. Please try again later!");
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
                url: '../../db_function/getItem.php',
                type: 'POST',
                data: {
                    id: Id
                },
                success: function(response) {
                    var item = JSON.parse(response);
                    $('#EditItemName').val(item.Name);
                    $('#EditItemPrice').val(item.Price);
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
            if (confirm("Are you sure to delete this item?")) {
                $.ajax({
                    url: '../../db_function/deleteItem.php',
                    type: 'POST',
                    data: {
                        id: Id
                    },
                    success: function(response) {
                        if (response === '1') {
                            alert("Item deleted successfully!");
                            window.location.reload();
                        } else {
                            alert("There was an error encountered during deletion of the item. Please try again later!");
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