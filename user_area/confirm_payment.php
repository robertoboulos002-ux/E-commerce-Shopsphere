<?php
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="SELECT * FROM `user_orders` WHERE order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}
/*
if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $order_date=$_POST['order_date'];
    
    // Insert payment details into user_payments table
    $insert_query = "INSERT INTO `user_payments` (`order_id`, `invoice_number`, `amount`, `payment_mode`, `order_date`) VALUES ($order_id, '$invoice_number', $amount, '$payment_mode', '$order_date')";
    $result = mysqli_query($con, $insert_query);

    // Check if the payment details were successfully inserted
    if($result){
        // Update order status to 'Paid' in user_orders table
        $update_orders = "UPDATE `user_orders` SET order_status='Complete' WHERE order_id=$order_id";
        $result_orders = mysqli_query($con, $update_orders);
        
        if($result_orders){
            // Display success message
            echo "<script>alert('Successfully completed the payment')</script>";

            // Redirect to profile page
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
        } else {
            // Display error message if updating order status fails
            echo "<script>alert('Failed to update order status')</script>";
        }
    } else {
        // Display error message if payment details insertion fails
        echo "<script>alert('Failed to insert payment details')</script>";
    }
}
*/
if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    
    // Set the order date to the current date
    $order_date = date('Y-m-d H:i:s'); // Assuming the order_date field is of type DATE
    
    // Insert payment details into user_payments table
    $insert_query = "INSERT INTO `user_payments` (`order_id`, `invoice_number`, `amount`, `payment_mode`, `order_date`) VALUES ($order_id, '$invoice_number', $amount, '$payment_mode', '$order_date')";
    $result = mysqli_query($con, $insert_query);

    // Check if the payment details were successfully inserted
    if($result){
        // Update order status to 'Paid' in user_orders table
        $update_orders = "UPDATE `user_orders` SET order_status='Complete' WHERE order_id=$order_id";
        $result_orders = mysqli_query($con, $update_orders);
        
        if($result_orders){
            // Display success message
            echo "<script>alert('Successfully completed the payment')</script>";

            // Redirect to profile page
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
        } else {
            // Display error message if updating order status fails
            echo "<script>alert('Failed to update order status')</script>";
        }
    } else {
        // Display error message if payment details insertion fails
        echo "<script>alert('Failed to insert payment details')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS File -->
  <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-secondary">
    <h1 class="text-center text-light mt-5">Confirm payment</h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center m-auto">
            <label for="" class='text-light'>Invoice Number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center m-auto">
                <label for="" class='text-light'>Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $    $amount_due=$row_fetch['amount_due'];
 ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center m-auto">
            <label for="" class='text-light'>Payment Mode</label>
    <select name="payment_mode" class="form-select w-50 m-auto" required>
        <option value="" disabled selected>Select Payment Mode</option>
        <option value="UPI">UPI</option>
        <option value="Netbanking">Netbanking</option>
        <option value="Paypal">Paypal</option>
        <option value="Cash on Delivery">Cash on Delivery</option>
        <option value="Pay Offline">Pay Offline</option>
    </select>
</div>

            <div class="form-outline my-4 text-center m-auto">
                
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>

    
</body>
</html>
