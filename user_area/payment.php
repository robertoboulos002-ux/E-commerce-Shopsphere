<?php
include('../includes/connect.php');
include('../functions/common_function.php');

session_start(); // Start the session

// Check if the user is logged in
if(isset($_SESSION['username'])) {
    // Retrieve the user ID from the session data
    $user_username = $_SESSION['username'];
    $get_user_id_query = "SELECT user_id FROM `user_table` WHERE username='$user_username'";
    $result = mysqli_query($con, $get_user_id_query);

    // Check if the query was successful
    if($result) {
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
    } else {
        // Handle error if the query fails
        echo "Error retrieving user ID: " . mysqli_error($con);
        // You may redirect the user to an error page or handle it differently
        exit;
    }
} else {
    // Redirect the user to the login page if they are not logged in
    header("Location: user_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <!-- Add your CSS links here -->
    <style>
        body {
            background-color: #f8f9fa;
            text-align: center;
    
        }
        .container {
            margin-top: 50px;
        }
        .payment-option {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .payment-option img {
            width: 50%;
            border-radius: 10px;
        }
        .payment-option h2 {
            margin-top: 20px;
            color: #007bff;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center mb-4">Payment Options</h2>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="payment-option">
                <h2 class="text-center mb-3">Online Payment</h2>
                <a href="https://www.omt.com.lb/en" target="_blank"><img src="../images/payment.jpg" alt="Online Payment" class="img-fluid"></a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="payment-option">
                <h2 class="text-center mb-3">Pay Offline</h2>
                <p class="text-center">Click below to proceed with offline payment.</p>
                <a href="order.php?user_id=<?= $user_id ?>" class="btn btn-primary btn-lg btn-block">Pay Offline</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
