<?php
include("../includes/connect.php");


if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
    $available_quantity=$_POST['available_quantity']; // field for quantity
    //accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    //accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if ($product_title == '' or $product_description == '' or $product_keywords == '' or $product_category == '' or $product_brand == '' or $product_price == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == '') {
        echo "<script>alert('Please fill the available fields')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");
        //insert query including available_quantity
        $insert_product = "INSERT INTO `products` (`product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `available_quantity`, `date`, `status`) 
VALUES ('$product_title','$product_description','$product_keywords','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price','$available_quantity',NOW(),'$product_status')";

        $result_query = mysqli_query($con, $insert_product);
        if ($result_query) {
            echo "<script>alert('Successfully inserted')</script>";
            echo "<script>window.open('index.php?view_product','_self')</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product- Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-light">
    <div class="container mt-3 w-50 m-auto">
        <h1 class="text-center">Insert Products</h1>
        <!-- form-->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Title-->
            <div class="form-outline mb-4">
                <label for="Product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <!-- Description-->
            <div class="form-outline mb-4">
                <label for="Product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control"
                    placeholder="Enter Product Description" autocomplete="off" required="required">
            </div>
            <!-- Keywords-->
            <div class="form-outline mb-4">
                <label for="Product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                    placeholder="Enter Product Keyword" autocomplete="off" required="required">
            </div>
            <!-- categories-->
            <div class="form-outline mb-4">
                <select name="product_category" id="" class="form-select" required>
                    <option value="">Select a Category</option>
                    <?php
                    $select_query = "Select * from `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>

                </select>
            </div>
            <!-- Brands-->
            <div class="form-outline mb-4">
                <select name="product_brand" id="" class="form-select" required>
                    <option value=''>Select a brand</option>
                    <?php
                    $select_query = "Select * from `brands`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- images  -->
            <div class="form-outline mb-4">
                <label for="Product_image1" class="form-label">Image 1</label>
                <input type="file" name="product_image1" id="product_keywords" class="form-control" required>
            </div>
            <div class="form-outline mb-4">
                <label for="Product_image2" class="form-label">Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required>
            </div>
            <div class="form-outline mb-4">
                <label for="Product_image3" class="form-label">Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required>
            </div>

            <!-- Quantity -->
            <div class="form-outline mb-4">
                <label for="Product_quantity" class="form-label">Product Quantity</label>
                <input type="number" name="available_quantity" id="available_quantity" class="form-control"
                    placeholder="Enter Product Quantity" autocomplete="off" required="required">
            </div>

            <!-- Price-->
            <div class="form-outline mb-4">
                <label for="Product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                    placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>
            <!-- Submit-->
            <div class="form-outline mb-4">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
        </form>
    </div>
</body>

</html>