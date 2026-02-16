<?php
/*
if(isset($_GET['edit_brand'])){
    $edit_brand=$_GET['edit_brand'];
    //echo $edit_brand;

    $get_brand="select * from `brands` where brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brand);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
    //echo $brand_title;
}
if(isset($_POST['edit_brand'])){
    $brand_title=$_POST['brand_title'];
    $update_quey="update `brands` set brand_title='$brand_title' where brand_id=$edit_brand";
    $result_bra=mysqli_query($con,$update_quey);
    if($result_bra){
        echo "<script>alert('brand has been updated successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}

*/

include("../includes/connect.php"); // Include the database connection if it's not already included

if (isset($_GET['edit_brand'])) {
    $edit_brand = $_GET['edit_brand'];

    // Fetch the current brand details
    $get_brand = "SELECT * FROM `brands` WHERE brand_id = $edit_brand";
    $result = mysqli_query($con, $get_brand);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row['brand_title'];
}

if (isset($_POST['edit_brand'])) {
    $brand_title = $_POST['brand_title'];

    // Check if the brand already exists
    $check_query = "SELECT * FROM `brands` WHERE brand_title = '$brand_title' AND brand_id != $edit_brand";
    $check_result = mysqli_query($con, $check_query);
    $number = mysqli_num_rows($check_result);

    if ($number > 0) {
        echo "<script>alert('This brand already exists. Please choose a different name.')</script>";
    } else {
        // Update the brand title if it's unique
        $update_query = "UPDATE `brands` SET brand_title = '$brand_title' WHERE brand_id = $edit_brand";
        $result_bra = mysqli_query($con, $update_query);
        if ($result_bra) {
            echo "<script>alert('Brand has been updated successfully.')</script>";
            echo "<script>window.open('./index.php?view_brands', '_self')</script>";
        }
    }
}
?>


<div class="container mt-3">
    <h1 class="text-center">
        Edit brand
    </h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">brand Title</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" required="required" value="<?php echo $brand_title ?>">

        </div>
        <input type="submit" value="Update brand" class="btn btn-info px-3 mb-3" name="edit_brand" >
    </form>
    
</div>