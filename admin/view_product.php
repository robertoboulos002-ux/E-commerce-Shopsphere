<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <h3 class="text-center text-success">All products</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <?php
            $get_products = "SELECT * FROM `products`";
            $result = mysqli_query($con, $get_products);
            $row_count = mysqli_num_rows($result);

            if ($row_count == 0) {
                echo "<h2 class='text-danger text-center mt-5'>No Products</h2>";
            } else {
                echo "<tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Quantity</th>
                <th>Remaining</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class='bg-secondary text-light'>";
            }
            ?>
            <?php
            $number = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];
                $available_quantity = $row['available_quantity'];
                $number++;
            ?>
                <tr class='text-center'>
                    <td><?php echo $number ?></td>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./product_images/<?php echo $product_image1; ?>" class="product_image" /></td>
                    <td><?php echo $product_price; ?> /-</td>
                    <td><?php
                        $get_quantity = "SELECT SUM(quantity) AS total_quantity FROM `orders_pending` WHERE product_id = $product_id";
                        $result_quantity = mysqli_query($con, $get_quantity);
                        $row_quantity = mysqli_fetch_assoc($result_quantity);
                        $total_quantity = $row_quantity['total_quantity'] ? $row_quantity['total_quantity'] : 0; // If no result, show 0
                        echo $total_quantity;
                        ?></td>
                    <td>
                        <?php echo $available_quantity; ?> <!-- Display the available quantity here -->
                    </td>

                    <td><?php echo $status ?> </td>
                    <td><a href='index.php?edit_product=<?php echo $product_id ?>' class='text-success'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_product=<?php echo $product_id ?>' class='text-success' class="text-success" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $product_id; ?>"><i class='fa-solid fa-trash'></i></a></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
    </table>
    <!-- Modal -->
    <?php
    $result = mysqli_query($con, $get_products);
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
    ?>
        <div class="modal fade" id="exampleModal_<?php echo $product_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel_<?php echo $product_id; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="./index.php?view_product" class="text-light text-decoration-none">No</a></button>
                        <button type="button" class="btn btn-primary"> <a href='index.php?delete_product=<?php echo $product_id ?>' type="button" class="text-light text-decoration-none">Yes</a> </button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>