<?php
include('./includes/connect.php');
include('functions/common_function.php');
session_start();
//C:\Windows\System32\ipconfig

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopSphere</title>
  <!-- bootstrap CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS File -->
  <link rel="stylesheet" href="style.css">
  <style>
    body{
      overflow-x:hidden;
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
            if(isset($_SESSION['username'])){
              echo "<li class='nav-item'>
              <a class='nav-link' href='./user_area/profile.php'>My Account</a>
            </li>"; 
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./user_area/user_registration.php'>Register </a>
          </li>";
          }
            ?>
           <!-- <li class="nav-item">
              <a class="nav-link" href="./user_area/user_registration.php">Register</a>
            </li> -->
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
              <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="bi bi-flag"></i></a>
            </li>

          </ul>
          <form class="d-flex" role="search" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>
    <!-- calling cart function -->
    <?php
    cart();
    ?>
    <!-- Second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container-fluid">
        <ul class="navbar-nav me-auto">
            <li class='nav-item'>
                <a class='nav-link' href='#'>Welcome <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php
            if(isset($_SESSION['username'])){
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
    <div class="row px-1">
      <div class="col-md-10">
        <!-- products -->
        <div class="row">
          <!--fetching product-->
          <?php
          //calling function
          getproducts();
          get_unique_category();
          get_unique_brands();
          //$ip = getIPAddress();  
          //echo 'User Real IP Address - '.$ip;  
          ?>
          <!-- row end-->
        </div>
        <!-- column end-->
      </div>

      <div class="col-md-2 bg-secondary p-0">
        <!-- brands to be displayed-->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light">
              <h4> Brands</h4>
            </a>
          </li>
          <?php
          //displaying brand
          getbrands();
          ?>

        </ul>
        <!-- categories to be displayed-->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light">
              <h4>Categories</h4>
            </a>
          </li>
          <?php
          //calling
          getcategories()
          ?>
        </ul>
      </div>
    </div>
  </div>
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
