<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
// Start the session
session_start();

// Include necessary files and establish database connection
include('../includes/connect.php');

// Check if the username is set in the session
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Query to fetch user details based on username
    $get_user = "SELECT * FROM `user_table` WHERE username='$username'";
    $result_user = mysqli_query($con, $get_user);

    // Check if user exists
    if(mysqli_num_rows($result_user) > 0) {
        // Fetch user details
        $row_user = mysqli_fetch_assoc($result_user);
        $user_id = $row_user['user_id'];
        

        // Query to fetch user orders based on user_id
        $get_order_details = "SELECT * FROM `user_orders` WHERE user_id=$user_id";
        $result_orders = mysqli_query($con, $get_order_details);

        // Check if orders exist for the user
        $row_count = mysqli_num_rows($result_orders);
    } else {
        // If user does not exist, display error message
        echo "<h2 class='text-danger text-center mt-5'>User does not exist</h2>";
        exit; // Stop further execution
    }
} else {
    // If username is not set in session, display error message
    echo "<h2 class='text-danger text-center mt-5'>Session username not set</h2>";
    exit; // Stop further execution
}
?>

<h3 class="text-success">All My Orders</h3>

<?php
if ($row_count == 0) {
    echo "<h2 class='text-danger text-center mt-5'>No Orders Yet</h2>";
} else {
?>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>S1 no</th>
            <th>Amount Due</th>
            <th>Total Products</th>
            <th>Total Quantity</th>
            <!--<th>Combined Quantity</th> -->
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>
        <?php
        $number = 1;
        while ($row_orders = mysqli_fetch_assoc($result_orders)) {
            $order_id = $row_orders['order_id'];
            $amount_due = $row_orders['amount_due'];
            $total_products = $row_orders['total_products'];
            $invoice_number = $row_orders['invoice_number'];
            $order_status = $row_orders['order_status'];
            $order_date = $row_orders['order_date'];
            $get_quantity = "SELECT SUM(quantity) AS total_quantity FROM `orders_pending` WHERE order_id = $order_id";
            $result_quantity = mysqli_query($con, $get_quantity);
            $row_quantity = mysqli_fetch_assoc($result_quantity);
            $total_quantity = $row_quantity['total_quantity'] ? $row_quantity['total_quantity'] : 0;
            // Calculate Total Multiple Product
            $total_multiple_product = $total_products * $total_quantity;
            


            // Set order status text
            $order_status_text = ($order_status == 'pending') ? 'Incomplete' : 'Complete';

            echo "
                <tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$total_products</td>
                    <td>$total_quantity</td>
                    
                    <td>$invoice_number</td>
                    <td>$order_date</td>
                    <td>$order_status_text</td>";

            if ($order_status == 'Complete') {
                echo "<td>Paid</td>";
            } else {
                echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-success'>Confirm</a></td>";
            }
            echo "</tr>";
            $number++;
        }
        ?>
    </tbody>
</table>
<?php } ?>

</body>
</html>
