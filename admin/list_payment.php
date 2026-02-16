<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <?php
        $get_payments = "SELECT up.*, uo.order_date 
        FROM `user_payments` up 
        INNER JOIN `user_orders` uo ON up.order_id = uo.order_id";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No Payments</h2>";
        } else {
            echo "
            <tr>
                <th>SNO</th>
                <th>Invoice number</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Order Date</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
        }
        ?>
    </thead>
    <tbody class="bg-secondary text-light text-center">
    <?php
    $number = 0;
    while ($row_data = mysqli_fetch_assoc($result)) {
        $payment_id = $row_data['payment_id'];
        $order_id = $row_data['order_id'];
        $invoice_number = $row_data['invoice_number'];
        $amount = $row_data['amount'];
        $payment_mode = $row_data['payment_mode'];
        $order_date = $row_data['order_date'];
        $number++;
        echo "
        <tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$order_date</td>
            
            <td>
                <a href='index.php?delete_payment=$payment_id' class='text-success' type='button' data-bs-toggle='modal' data-bs-target='#exampleModal$payment_id'>
                    <i class='fa-solid fa-trash'></i>
                </a>
            </td>
        </tr>";
        ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?php echo $payment_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <a href="./index.php?list_payment" class="text-light text-decoration-none">No</a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href='index.php?delete_payment=<?php echo $payment_id ?>' class="text-light text-decoration-none">Yes</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    
    ?>
    </tbody>
</table> 

