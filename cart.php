<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        body {
            overflow-x: hidden;
        }

        .product-info {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f0f0f0;
        }

        .product-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .quantity,
        .price,
        .subtotal {
            margin-bottom: 5px;
        }
    </style>

</head>

<body>
    <!-- nav bar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "<li class='nav-item'>
              <a class='nav-link' href='./user_area/profile.php'>My Account</a>
            </li>";
                        } else {
                            echo "<li class='nav-item'>
            <a class='nav-link' href='./user_area/user_registration.php'>Register </a>
          </li>";
                        }
                        ?>
                        <!--
                        <li class="nav-item">
                            <a class="nav-link" href="./user_area/user_registration.php">Register</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-dash" viewBox="0 0 16 16">
                                    <path d="M6.5 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1z" />
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                </svg><sup><?php
                                            cart_item();
                                            ?></sup></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-flag"></i></a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
        <!-- calling cart function -->
        <?php
        cart();
        ?>
        <!-- second child 
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            <?php
            /*
      if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ". $_SESSION['username']."</a>
        </li>";
        }
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/user_login.php'>Login</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/logout.php'>Logout</a>
        </li>";
        }
        */
            ?>
      
       
            </ul>
        </nav> -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto">
                    <li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                <a class='nav-link' href='./user_area/logout.php'>Logout</a>
                </li>";
                    } else {
                        echo "<li class='nav-item'>
                <a class='nav-link' href='./user_area/user_login.php'>Login</a>
                </li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <!-- third child -->
        <div class="bd-light">
            <h3 class="text-center">
                Mystery Market
            </h3>
            <p class="text-center">Your Destination for Endless Choices</p>
        </div>
        <!-- fourth child -->
        <div class="container">
            <div class="row">
                <form action="" method="post">


                    <table class="table table-bordered text-center">

                        <tbody>
                            <!--php code to display dynamic data-->
                            <?php
                            global $con;
                            $get_ip_address = getIPAddress();
                            $total = 0;
                            $cart_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
                            $result = mysqli_query($con, $cart_query);
                            $result_count = mysqli_num_rows($result);
                            if ($result_count > 0) {
                                echo "<thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                        </thead>";
                                while ($row = mysqli_fetch_array($result)) {
                                    $product_id = $row['product_id'];
                                    $select_product = "Select * from `products` where product_id=$product_id";
                                    $result_product = mysqli_query($con, $select_product);
                                    while ($row_product_price = mysqli_fetch_array($result_product)) {
                                        $product_price = array($row_product_price['product_price']);
                                        $price_table = $row_product_price['product_price'];
                                        $product_title = $row_product_price['product_title'];
                                        $product_image1 = $row_product_price['product_image1'];
                                        $product_values = array_sum($product_price); //[500]
                                        $total += $product_values; //500



                            ?>
                                        <tr>
                                            <td><?php echo $product_title ?></td>
                                            <td><img src="./admin/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                                            <td>
                                                <input type="number" class="form-input w-50" name="qty[<?php echo $product_id; ?>]" value="<?php echo isset($qty[$product_id]) ? $qty[$product_id] : 1; ?>" min="1">

                                            </td>
                                            <?php
                                            $get_ip_address = getIPAddress();
                                            if (isset($_POST['update_cart'])) {
                                                $quantities = $_POST['qty'];
                                                $total = 0; // Reset total before recalculating
                                            
                                                // Inside the cart loop after quantity is updated
                                                foreach ($quantities as $product_id => $quantity) {
                                                    // Check the available quantity in the database
                                                    $check_quantity_query = "SELECT available_quantity FROM `products` WHERE product_id = $product_id";
                                                    $quantity_result = mysqli_query($con, $check_quantity_query);
                                                    $row = mysqli_fetch_assoc($quantity_result);
                                                    $available_quantity = $row['available_quantity'];
                                            
                                                    if ($quantity > $available_quantity) {
                                                        echo "<script>alert('Requested quantity exceeds available stock for $product_title. Only $available_quantity Quantity left.')</script>";
                                                    } else {
                                                        // Update quantity in the cart
                                                        $update_cart = "UPDATE `cart_details` SET quantity = $quantity WHERE ip_address='$get_ip_address' AND product_id=$product_id";
                                                        mysqli_query($con, $update_cart);
                                            
                                                        // Get product details from the database
                                                        $select_product = "SELECT * FROM `products` WHERE product_id=$product_id";
                                                        $result_product = mysqli_query($con, $select_product);
                                                        $row_product_price = mysqli_fetch_array($result_product);
                                            
                                                        // Calculate subtotal
                                                        $product_price = $row_product_price['product_price'];
                                                        $subtotal = $quantity * $product_price;
                                            
                                                        // Update total
                                                        $total += $subtotal;
                                            
                                                        // Update the available quantity in the products table
                                                        $update_quantity_query = "UPDATE `products` SET available_quantity = available_quantity - $quantity WHERE product_id = $product_id";
                                                        mysqli_query($con, $update_quantity_query);
                                                    }
                                            
                                                    // Display product information
                                                    echo "<div class='product-info'>
                                                        <p class='product-title'>Product Title: $product_title</p>
                                                        <p class='quantity'>Quantity: $quantity</p>
                                                        <p class='price'>Price: $product_price</p>
                                                        <p class='subtotal'>Subtotal: $subtotal</p>
                                                    </div>";
                                                }
                                            }
                                            

                           
                                            ?>


                                            <td><?php echo $price_table ?>/-</td>
                                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                            <td>
                                                <!--<button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                                                <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                                                <!--<button class="bg-info px-3 py-2 border-0 mx-3">Remove</button>-->
                                                <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                                            </td>
                                        </tr>
                            <?php
                                    }
                                }
                            } else {
                                echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <!--  subtotal -->
                    <div class="d-flex mb-4">
                        <?php
                        $get_ip_address = getIPAddress();
                        $cart_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<h4 class='px-3'>SubTotal: <strong class='text-info'> $total/-</strong></h4>
                        <input type='submit' value='ContinueShopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                          
                        <button class='bg-secondary p-3 py-2 border-0'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                        } else {
                            echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                        }
                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                        ?>

                    </div>
            </div>
        </div>
        </form>
        <!-- function to remove item -->
        
        <?php
        /*
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "Delete from `cart_details` where product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }

        echo $remove_item = remove_cart_item();
        */
        
function remove_cart_item() {
    global $con;
    if (isset($_POST['remove_cart'])) {
        foreach ($_POST['removeitem'] as $remove_id) {
            // Retrieve the quantity of the item in the cart before removing it
            $get_quantity_query = "SELECT quantity FROM `cart_details` WHERE product_id = $remove_id";
            $quantity_result = mysqli_query($con, $get_quantity_query);
            $row = mysqli_fetch_assoc($quantity_result);
            $cart_quantity = $row['quantity'];

            // Update the available quantity in the products table
            $update_quantity_query = "UPDATE `products` SET available_quantity = available_quantity + $cart_quantity WHERE product_id = $remove_id";
            mysqli_query($con, $update_quantity_query);

            // Delete the item from the cart
            $delete_query = "DELETE FROM `cart_details` WHERE product_id = $remove_id";
            $run_delete = mysqli_query($con, $delete_query);

            if ($run_delete) {
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}

echo $remove_item = remove_cart_item();
?>

        
        


        <!-- include footer-->
        <?php
        include('./includes/footer.php');
        ?>
    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>