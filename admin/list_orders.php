<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
    <?php
    $get_orders = "SELECT * FROM `user_orders`";
    $result = mysqli_query($con, $get_orders);
    $row_count = mysqli_num_rows($result);

    if ($row_count == 0) {
        echo "<h2 class='text-danger text-center mt-5'>No Orders</h2>";
    } else {
        echo "<tr>
                <th>SNO</th>
                <th>Due Amount</th>
                <th>Invoice number</th>
                <th>Total Products</th>
                <th>Total Quantity</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody class='bg-secondary text-center'>";
    }
    $number = 0;
    while ($row_data = mysqli_fetch_assoc($result)) {
        $order_id = $row_data['order_id'];
        $user_id = $row_data['user_id'];
        $amount_due = $row_data['amount_due'];
        $invoice_number = $row_data['invoice_number'];
        $total_products = $row_data['total_products'];
        $order_date = $row_data['order_date'];
        $order_status = $row_data['order_status'];
         // Fetch total quantity for each order
         $get_quantity = "SELECT SUM(quantity) AS total_quantity FROM `orders_pending` WHERE order_id = $order_id";
         $result_quantity = mysqli_query($con, $get_quantity);
         $row_quantity = mysqli_fetch_assoc($result_quantity);
         $total_quantity = $row_quantity['total_quantity'] ? $row_quantity['total_quantity'] : 0; // Show 0 if no result
        $number++;
        echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$invoice_number</td>
                <td>$total_products</td>
                <td>$total_quantity</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td>
                    <a href='index.php?delete_order=$order_id' class='text-success' type='button' data-bs-toggle='modal' data-bs-target='#exampleModal$order_id'>
                        <i class='fa-solid fa-trash'></i>
                    </a>
                </td>
              </tr>";
        ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?php echo $order_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <a href="./index.php?list_orders" class="text-light text-decoration-none">No</a>
                        </button>
                        <a href="index.php?delete_order=<?php echo $order_id ?>" class="btn btn-primary text-light text-decoration-none">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </tbody>
</table>
