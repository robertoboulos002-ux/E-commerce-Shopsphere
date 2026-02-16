<?php
include('../includes/connect.php');
include('../functions/common_function.php');
//if active start the session
@session_start();
// Check if admin is not logged in
if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php"); // Redirect to admin_login.php
    exit(); // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .product_image{
            width:100px;
            object-fit: contain;
            
        }
        .edit_image{
            width:100px;
            object-fit: contain;
        }
        body{
            overflow-x:hidden;
        }
    </style>

  
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
            <!-- first child -->
        <!--<nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>

                </nav>
            </div>
        </nav>-->
        <!-- welcome and login space-between
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
      <?php
      /*
      if(!isset($_SESSION['admin_name'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ". $_SESSION['admin_name']."</a>
        </li>";
        }
      
        if(!isset($_SESSION['admin_name'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='admin_login.php'>Login</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
        }
        */
        ?>
       
      </ul>
    </nav>-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container-fluid">
        <ul class="navbar-nav me-auto">
            <li class='nav-item'>
                <a class='nav-link' href='#'>Welcome <?php echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Guest'; ?></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php
            if(isset($_SESSION['admin_name'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='admin_login.php'>Logout</a>
                </li>";
            } else {
                echo "<li class='nav-item'>
                <a class='nav-link' href='logout.php'>Login</a>
                </li>";
            }
            ?>
        </ul>
    </div>
</nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
         <!-- third child -->  
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/logo.png" alt="" class="admin-image"></a>
                    <?php
      if(!isset($_SESSION['admin_name'])){
          echo "<p class='text-light text-center'>Admin Name</p>";
        }else{
            echo "<p class='text-light text-center'>" . $_SESSION['admin_name'] . "</p>";

        }
        ?>
                    <!--<p class="text-light text-center">Admin Name</p> -->
                </div> 
                <!-- button*10>a.nav-link.text-light.bg-info.my-1 --> 
                <div class="button text-center">
                    <button class="my-3"><a href="index.php?insert_product" class="nav-link text-light 
                    bg-info m-2 mx-2 py-2">Insert Products</a></button><button><a href="index.php?view_product" class="nav-link text-light 
                    bg-info m-2 mx-2 py-2">View Products</a></button><button><a href="index.php?insert_category" class="nav-link text-light 
                    bg-info m-2 mx-2 py-2">Insert Categories</a></button><button><a href="index.php?view_categories" class="nav-link text-light 
                    bg-info m-2 mx-2 py-2">View Categories</a></button><button><a href="index.php?insert_brands" class="nav-link text-light 
                    bg-info m-2 mx-2 py-2">Insert Brands</a></button><button><a href="index.php?view_brands" class="nav-link text-light 
                    bg-info m-2 mx-2 py-2">View Brands</a></button><button><a href="index.php?list_orders" class="nav-link text-light 
                    bg-info m-2 mx-2 py-2">All orders</a></button><button><a href="index.php?list_payment" class="nav-link text-light 
                    bg-info m-2 mx-2 py-2">All Payments</a></button><button><a href="index.php?list_users" class="nav-link text-light 
                    bg-info m-2 mx-2 py-2">List users</a></button><button><a href="logout.php" class="nav-link text-light 
                    bg-info m-2 mx-2 py-2">Logout</a></button>
                </div>
            </div>
        </div>  
    </div>
    <!-- fourth child --> 
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_category']))
            include('insert_categories.php');
        if(isset($_GET['insert_brands']))
            include('insert_brands.php');

        if(isset($_GET['view_product']))
            include('view_product.php');
        if(isset($_GET['edit_product']))
            include('edit_product.php');

        if(isset($_GET['delete_product']))
            include('delete_product.php');

        if(isset($_GET['view_categories']))
            include('view_categories.php');

        if(isset($_GET['view_brands']))
            include('view_brands.php');

        if(isset($_GET['edit_category']))
            include('edit_category.php');

        if(isset($_GET['edit_brand']))
            include('edit_brands.php');

        if(isset($_GET['delete_category']))
            include('delete_category.php');

            
        if(isset($_GET['list_orders']))
            include('list_orders.php');
        if(isset($_GET['delete_order']))
            include('delete_order.php');
        
        if(isset($_GET['list_payment']))
            include('list_payment.php');
            
            if(isset($_GET['delete_payment']))
            include('delete_payment.php');
            
            if(isset($_GET['delete_brand']))
            include('delete_brand.php');

            
            if(isset($_GET['list_users']))
            include('list_users.php');
            if(isset($_GET['delete_users']))
            include('delete_users.php');
            if(isset($_GET['insert_product']))
            include('insert_product.php');
           
           

       

        ?>


    </div>
    <?php
  include('../includes/footer.php');
  ?>
  </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>