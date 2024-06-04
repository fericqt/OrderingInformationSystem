<!DOCTYPE html>
<html lang="en">

<?php include "../../inc/header.php"; ?>

<body>

    <?php include "../../inc/sidebar.php"; ?>
    <?php include "../../inc/topbar.php"; ?>

    <div class="content">
        <h1 class="mb-4">Order Management</h1>
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-item">Add New Item</button>
        </div>
        <p>On Queue</p>
        <hr>
        <div class="table-responsive">
            <table id="items-table1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Total Cost</th>
                        <th>Payment</th>
                        <th>Change</th>
                        <th>Remarks</th>
                        <th>Status</th>
                        <th>Processed By</th>
                        <th>Date Ordered</th>
                        <th>Date Processed</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "../../db_function/conf.php";

                    $query = "SELECT tblo.IdTrack as OrderID, 
                                     tblu.Username as Username,
                                     tblo.Total as Total,
                                     tblo.Payment as Payment,
                                     tblo.PaymentChange as PaymentChange,
                                     tblo.Remarks as Remarks,
                                     tblo.Status as Status,
                                     tblo.ProcessBy as ProcessBy,
                                     tblo.DateOrdered as DateOrdered,
                                     tblo.DateProcessed as DateProcessed
                              FROM tblorders tblo  INNER JOIN tblusers tblu ON tblo.UserIdTrack =  tblu.IdTrack WHERE tblo.Status = 'OnQueue'";
                    $result = mysqli_query($conn, $query);

                    // Display users in table rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['OrderID'] . "</td>";
                        echo "<td>" . $row['Username'] . "</td>";
                        echo "<td>" . $row['Total'] . "</td>";
                        echo "<td>" . $row['Payment'] . "</td>";
                        echo "<td>" . $row['PaymentChange'] . "</td>";
                        echo "<td>" . $row['Remarks'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "<td>" . $row['ProcessBy'] . "</td>";
                        echo "<td>" . $row['DateOrdered'] . "</td>";
                        echo "<td>" . $row['DateProcessed'] . "</td>";
                        echo "<td>";
                        echo '<a type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#edit-item" data-id="' . $row['OrderID'] . '">Edit</a>';
                        echo '<a type="button" class="btn btn-info view-btn" data-toggle="modal" data-target="#view-item" data-id="' . $row['OrderID'] . '">View</a>';
                        echo '<a type="button" class="btn btn-danger delete-btn" data-id="' . $row['OrderID'] . '">Delete</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <p>Preparing</p>
        <hr>

        <div class="table-responsive">
            <table id="items-table2" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Total Cost</th>
                        <th>Payment</th>
                        <th>Change</th>
                        <th>Remarks</th>
                        <th>Status</th>
                        <th>Processed By</th>
                        <th>Date Ordered</th>
                        <th>Date Processed</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "../../db_function/conf.php";

                    $query = "SELECT tblo.IdTrack as OrderID, 
                                     tblu.Username as Username,
                                     tblo.Total as Total,
                                     tblo.Payment as Payment,
                                     tblo.PaymentChange as PaymentChange,
                                     tblo.Remarks as Remarks,
                                     tblo.Status as Status,
                                     tblo.ProcessBy as ProcessBy,
                                     tblo.DateOrdered as DateOrdered,
                                     tblo.DateProcessed as DateProcessed
                              FROM tblorders tblo  INNER JOIN tblusers tblu ON tblo.UserIdTrack =  tblu.IdTrack WHERE tblo.Status = 'Preparing'";
                    $result = mysqli_query($conn, $query);

                    // Display users in table rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['OrderID'] . "</td>";
                        echo "<td>" . $row['Username'] . "</td>";
                        echo "<td>" . $row['Total'] . "</td>";
                        echo "<td>" . $row['Payment'] . "</td>";
                        echo "<td>" . $row['PaymentChange'] . "</td>";
                        echo "<td>" . $row['Remarks'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "<td>" . $row['ProcessBy'] . "</td>";
                        echo "<td>" . $row['DateOrdered'] . "</td>";
                        echo "<td>" . $row['DateProcessed'] . "</td>";
                        echo "<td>";
                        echo '<a type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#edit-item" data-id="' . $row['OrderID'] . '">Edit</a>';
                        echo '<a type="button" class="btn btn-info view-btn" data-toggle="modal" data-target="#view-item" data-id="' . $row['OrderID'] . '">View</a>';
                        echo '<a type="button" class="btn btn-danger delete-btn" data-id="' . $row['OrderID'] . '">Delete</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <p>Served</p>
        <hr>

        <div class="table-responsive">
            <table id="items-table3" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Total Cost</th>
                        <th>Payment</th>
                        <th>Change</th>
                        <th>Remarks</th>
                        <th>Status</th>
                        <th>Processed By</th>
                        <th>Date Ordered</th>
                        <th>Date Processed</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "../../db_function/conf.php";

                    $query = "SELECT tblo.IdTrack as OrderID, 
                                     tblu.Username as Username,
                                     tblo.Total as Total,
                                     tblo.Payment as Payment,
                                     tblo.PaymentChange as PaymentChange,
                                     tblo.Remarks as Remarks,
                                     tblo.Status as Status,
                                     tblo.ProcessBy as ProcessBy,
                                     tblo.DateOrdered as DateOrdered,
                                     tblo.DateProcessed as DateProcessed
                              FROM tblorders tblo  INNER JOIN tblusers tblu ON tblo.UserIdTrack =  tblu.IdTrack WHERE tblo.Status = 'Served'";
                    $result = mysqli_query($conn, $query);

                    // Display users in table rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['OrderID'] . "</td>";
                        echo "<td>" . $row['Username'] . "</td>";
                        echo "<td>" . $row['Total'] . "</td>";
                        echo "<td>" . $row['Payment'] . "</td>";
                        echo "<td>" . $row['PaymentChange'] . "</td>";
                        echo "<td>" . $row['Remarks'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "<td>" . $row['ProcessBy'] . "</td>";
                        echo "<td>" . $row['DateOrdered'] . "</td>";
                        echo "<td>" . $row['DateProcessed'] . "</td>";
                        echo "<td>";
                        echo '<a type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#edit-item" data-id="' . $row['OrderID'] . '">Edit</a>';
                        echo '<a type="button" class="btn btn-info view-btn" data-toggle="modal" data-target="#view-item" data-id="' . $row['OrderID'] . '">View</a>';
                        echo '<a type="button" class="btn btn-danger delete-btn" data-id="' . $row['OrderID'] . '">Delete</a>';
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
                    <h5 class="modal-title" id="add-item-label">Add New Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-item-form">
                        <div class="form-group">
                            <label for="ItemSelect">Select Item:</label>
                            <select class="form-control" id="ItemSelect" name="ItemSelect">
                                <?php
                                include_once "../../db_function/conf.php";

                                $sQuery = "SELECT * FROM tblitems";
                                $result = mysqli_query($conn, $sQuery);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['IdTrack'] . '" data-price="' . $row['Price'] . '">' . $row['Name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ItemQty">Quantity:</label>
                            <input type="number" class="form-control" id="ItemQty" name="ItemQty" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="ItemPrice">Item Price:</label>
                            <input type="text" class="form-control" id="ItemPrice" name="ItemPrice" readonly>
                        </div>
                        <div class="form-group">
                            <label for="TotalCost">Total Cost:</label>
                            <input readonly type="text" class="form-control" id="TotalCost" name="TotalCost" readonly>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="addItemButton">Add Item</button>
                        </div>
                        <div class="mt-3">
                            <h6>Order Summary</h6>
                            <ul id="orderSummary"></ul>
                            <hr>
                            Total Cost: ₱<span id="OrderTotal">0.00</span>
                            <hr>
                        </div>
                        <div class="form-group">
                            <label for="Remarks">Additioanl Remarks:</label>
                            <input type="text" class="form-control" id="Remarks" name="remarks">
                        </div>
                        <div id="place-order-button" class="text-right">
                            <button type="reset" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit Orders</button>
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
                    <h5 class="modal-title" id="edit-item-label">Update Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-item-form" method="post">
                        <div class="form-group">
                            <label for="IdTrack">Order ID:</label>
                            <input type="text" class="form-control" id="EditIdTrack" name="IdTrack" readonyl required>
                        </div>
                        <div class="form-group">
                            <label for="UserType" class="form-label">Status:</label>
                            <select id="EditStatus" name="Status" class="form-control">
                                <option value="OnQueue">OnQueue</option>
                                <option value="Preparing">Preparing</option>
                                <option value="Served">Served</option>
                            </select>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- View item Modal -->
    <div class="modal fade" id="view-item" tabindex="-1" role="dialog" aria-labelledby="view-item-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-item-label">View Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="items-order-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="order-details-body">
                                <!-- Order details will be dynamically added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include "../../inc/script.php"; ?>
<script>
    $(document).ready(function() {
        var orderItems = [];
        hideShowButtons(orderItems);
        // Update the price field based on the selected item
        $('#ItemSelect').change(function() {
            $('#ItemPrice').val($(this).find(':selected').data('price'));
            var qty = parseInt($('#ItemQty').val());
            var price = parseFloat($('#ItemPrice').val());
            //
            if (!isNaN(price) && !isNaN(qty)) {
                computeTotal(qty, price);
            }
        });

        //compute on input change
        $('#ItemQty').on('input', function() {
            var price = parseFloat($('#ItemPrice').val());
            var qty = parseInt($('#ItemQty').val());
            if (!isNaN(price) && !isNaN(qty)) {
                computeTotal(qty, price);
            }
        });

        // Initialize the price field on page load
        $('#ItemSelect').trigger('change');

        // Add item to order summary
        $('#addItemButton').click(function() {
            //
            var itemIdTrack = $('#ItemSelect').val();
            var itemName = $('#ItemSelect option:selected').text();
            var quantity = $('#ItemQty').val();
            var price = $('#ItemPrice').val();
            var total = $('#TotalCost').val();

            orderItems.push({
                ItemIdTrack: itemIdTrack,
                ItemName: itemName,
                Qty: quantity,
                Price: price,
                Total: total
            });

            // Update order summary
            var orderSummaryHtml = '';
            var orderTotal = 0;
            orderItems.forEach(function(orderItem, index) {
                orderSummaryHtml += '<li>' + orderItem.Qty + ' x ' + orderItem.ItemName + ' @ ₱' + orderItem.Price + ' each = ₱' + orderItem.Total + ' </li>';
            });
            orderItems.forEach(function(item) {
                item.Total = item.Qty * item.Price;
                orderTotal += item.Total;
            });
            $('#orderSummary').html(orderSummaryHtml);
            $('#OrderTotal').text(orderTotal);

            // Clear the form fields
            $('#ItemQty').val(1);
            $('#ItemSelect').trigger('change');
            hideShowButtons(orderItems);

        });

        // Handle form submission
        $('#add-item-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this).serialize();
            $.ajax({
                url: '../../db_function/addOrders.php',
                type: 'POST',
                data: {
                    orderItems: orderItems,
                    formData: form
                },
                success: function(response) {
                    if (response === '1') {
                        alert("Order submitted successfully!");
                        window.location.reload();
                    } else {
                        alert("There was an error encountered during submission. Please try again later!");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        //
        function hideShowButtons(orderItems) {
            // Show or hide the place order button
            if (orderItems.length > 0) {
                document.getElementById('place-order-button').style.display = 'block';
            } else {
                document.getElementById('place-order-button').style.display = 'none';
            }
        }

        function computeTotal(qty, price) {
            var total = qty * price;
            $('#TotalCost').val(total.toFixed(2));
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#edit-item-form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '../../db_function/editOrderStatus.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response === '1') {
                        alert("Status updated successfully!");
                        window.location.reload();
                    } else {
                        alert("There was an error encountered during update of the status. Please try again later!");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('#items-table1, #items-table2, #items-table3').on('click', '.edit-btn', function() {
            var Id = $(this).data('id');
            $.ajax({
                url: '../../db_function/getOrderStatus.php',
                type: 'POST',
                data: {
                    id: Id
                },
                success: function(response) {
                    var item = JSON.parse(response);
                    $('#EditIdTrack').val(item.IdTrack);
                    $('#EditStatus').val(item.Status);
                    $('#edit-item').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('#items-table1, #items-table2, #items-table3').on('click', '.delete-btn', function() {
            var Id = $(this).data('id');
            if (confirm("Are you sure to delete this order?")) {
                $.ajax({
                    url: '../../db_function/deleteOrder.php',
                    type: 'POST',
                    data: {
                        id: Id
                    },
                    success: function(response) {
                        if (response === '1') {
                            alert("Order deleted successfully!");
                            window.location.reload();
                        } else {
                            alert("There was an error encountered during deletion of the order. Please try again later!");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        $('#items-table1, #items-table2, #items-table3').on('click', '.view-btn', function() {
            var Id = $(this).data('id');
            $.ajax({
                url: '../../db_function/getOrderDetails.php',
                type: 'POST',
                data: {
                    id: Id
                },
                success: function(response) {
                    $('#order-details-body').html(response);
                    $('#view-item').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

    });
</script>

</html>