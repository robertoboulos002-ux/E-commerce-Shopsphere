<?php
//connection
include('./includes/connect.php');

//getting products
function getproducts(){

          global $con;
          //condition to check isset or not
          if(!isset($_GET['Category'])){
          if(!isset($_GET['brand'])){
          $select_query="select * from `products` order by rand() limit 0,6";
          $result_query=mysqli_query($con,$select_query);
          
          //echo $row['product_title'];
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
            echo "<div class='col-md-4 '>
            <div class='card'>
              <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'> $product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
              </div>
            </div>
          </div>";
          }
          
}
}
}

//getting all product

function get_all_product(){
  global $con;
  //condition to check isset or not
  if(!isset($_GET['Category'])){
  if(!isset($_GET['brand'])){
  $select_query="select * from `products` order by rand()";
  $result_query=mysqli_query($con,$select_query);
  
  //echo $row['product_title'];
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo "<div class='col-md-4 '>
    <div class='card'>
      <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'> $product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
      </div>
    </div>
  </div>";
  }
  
}
}
}
//getting unique category
function get_unique_category(){

  global $con;
  //connection to check isset or not
  if(isset($_GET['Category'])){
    $category_id=$_GET['Category'];
  
  $select_query="select * from `products` where category_id=$category_id";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'> No store for this category</h2>";
  }
  //echo $row['product_title'];
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo "<div class='col-md-4 '>
    <div class='card'>
      <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'> $product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
      </div>
    </div>
  </div>";
  }
  
}
}

//getting unique brands
function get_unique_brands(){

  global $con;
  //connection to check isset or not
  if(isset($_GET['brand'])){
    $brand_id=$_GET['brand'];
  
  $select_query="select * from `products` where brand_id=$brand_id";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'> No brand available for service</h2>";
  }
  //echo $row['product_title'];
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo "<div class='col-md-4 '>
    <div class='card'>
      <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'> $product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
      </div>
    </div>
  </div>";
  }
  
}
}

//displaying brand in sidenav
function getbrands(){
  global $con;
  $select_brands = "Select * from `brands`";
          $result_brands = mysqli_query($con, $select_brands);
          while ($row_data = mysqli_fetch_assoc($result_brands)) {
            $brand_title = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];
            echo "<li class='nav-item'>
            <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
          </li>";
          }
}
//displaying categories in sidenav
function getcategories(){
  global $con;
$select_categories = "Select * from `categories`";
          $result_categories = mysqli_query($con, $select_categories);
          while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo "<li class='nav-item'>
            <a href='index.php?Category=$category_id' class='nav-link text-light'>$category_title</a>
          </li>";
          }
        }
//searching product

function search_product(){

    global $con;
    if(isset($_GET['search_data_product'])) { 
      $search_data=$_GET['search_data'];
    $search_query="Select * from `products` where product_title like '%$search_data%'";
    $result_query=mysqli_query($con,$search_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo "<h2 class='text-center text-danger'>No Result match</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo "<div class='col-md-4 '>
      <div class='card'>
        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'> $product_description</p>
          <p class='card-text'>Price: $product_price/-</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
      </div>
    </div>";
    }
    
}
}

//view details function

function view_details(){
  global $con;
  //condition to check isset or not
  if(isset($_GET['product_id'])){
  if(!isset($_GET['Category'])){
  if(!isset($_GET['brand'])){
    $product_id=$_GET['product_id'];
  $select_query="select * from `products` where product_id=$product_id";
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo "<div class='col-md-4 '>
    <div class='card'>
      <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'> $product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
        <a href='index.php' class='btn btn-secondary'>Go home</a>
      </div>
    </div>
  </div>
  <div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-5'>Related products</h4>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>  

                    </div>
                    <div class='col-md-6'>
                    <img src='./admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                    </div>
                </div>
                
            </div>";
  }
  
}
}
  }
}

//get ip address function
//identifes every device connected to the internet 
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  

//cart function
/*
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address='$get_ip_address' and product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo "<script>alert('This item already present inside cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    else{
      $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_address',0)";
      $result_query=mysqli_query($con,$insert_query);
      echo "<script>alert('Item is added to cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";

    }
  }

}

function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];
    $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address' AND product_id=$get_product_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    
    if($num_of_rows > 0){
      // If the item is already in the cart, update the quantity
      $update_query = "UPDATE `cart_details` SET quantity = quantity + 1 WHERE ip_address='$get_ip_address' AND product_id=$get_product_id";
      mysqli_query($con, $update_query);
      echo "<script>alert('Item already added in the cart')</script>";
    } else {
      // If the item is not in the cart, insert it with quantity 1
      $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_address', 1)";
      mysqli_query($con, $insert_query);
      echo "<script>alert('Item added to cart')</script>";
    }
    echo "<script>window.open('index.php','_self')</script>";
  }
}
*/
function cart(){
  if(isset($_GET['add_to_cart'])){
      global $con;
      $get_ip_address = getIPAddress();
      $get_product_id = $_GET['add_to_cart'];

      // Check if the product is in stock
      $check_quantity_query = "SELECT available_quantity FROM `products` WHERE product_id = $get_product_id";
      $quantity_result = mysqli_query($con, $check_quantity_query);
      $row = mysqli_fetch_assoc($quantity_result);
      $available_quantity = $row['available_quantity'];

      if ($available_quantity > 0) {
          // If the product is in stock, proceed to add to the cart
          $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address' AND product_id=$get_product_id";
          $result_query = mysqli_query($con, $select_query);
          $num_of_rows = mysqli_num_rows($result_query);
          
          if($num_of_rows > 0){
              // If the item is already in the cart, update the quantity in the cart
              $update_cart_query = "UPDATE `cart_details` SET quantity = quantity + 1 WHERE ip_address='$get_ip_address' AND product_id=$get_product_id";
              mysqli_query($con, $update_cart_query);
              echo "<script>alert('Item already added in the cart, updated quantity.')</script>";
          } else {
              // If the item is not in the cart, insert it into the cart with quantity 1
              $insert_cart_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_address', 1)";
              mysqli_query($con, $insert_cart_query);
              echo "<script>alert('Item added to cart.')</script>";
          }

          // Update the available quantity in the products table
          $update_quantity_query = "UPDATE `products` SET available_quantity = available_quantity - 1 WHERE product_id = $get_product_id";
          mysqli_query($con, $update_quantity_query);

          echo "<script>window.open('index.php','_self')</script>";
      } else {
          // If the product is out of stock, show a message
          echo "<script>alert('This item is out of stock and cannot be added to the cart.')</script>";
          echo "<script>window.open('index.php','_self')</script>";
      }
  }
}



//function to get cart item number
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIPAddress();
    $select_query="Select * from `cart_details` where ip_address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_item=mysqli_num_rows($result_query);
   } else{
      global $con;
    $get_ip_address = getIPAddress();
    $select_query="Select * from `cart_details` where ip_address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_item=mysqli_num_rows($result_query);
    }
    echo $count_cart_item;
  }
  // total price function
  function total_cart_price(){
    global $con;
    $get_ip_address = getIPAddress();
    $total=0;
    $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $select_product="Select * from `products` where product_id=$product_id";
      $result_product=mysqli_query($con,$select_product);
      while($row_product_price=mysqli_fetch_array($result_product)){
        $product_price=array($row_product_price['product_price']); //[200,300]
        $product_values=array_sum($product_price); //[500]
        $total+=$product_values; //500


      }
    }
    echo $total;

  }
//get user order details
function get_user_order_details(){
  global $con;
  //used to store information about the user that can be accessed across multiple pages. 
  //a session is initiated on user's first visit, and the session data is saved on the server.
  $username=$_SESSION['username'];
  $get_details="Select * from `user_table` where username='$username'";
  $result_query=mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
          $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
          $result_query_orders=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows($result_query_orders);
          if($row_count>0){
            echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'> $row_count </span> pending orders</h3>
            <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
          }else{
            echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3>
            <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
   
          }

        }
      }
    }
  }
}
  /*
  function get_user_order_details($con) {
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $get_details = "SELECT * FROM `user_table` WHERE username='$username'";
        $result_query = mysqli_query($con, $get_details);

        if (!$result_query) {
            echo "Error: " . mysqli_error($con);
            return;
        }

        $row_query = mysqli_fetch_array($result_query);
        if (!$row_query) {
            echo "User not found.";
            return;
        }

        $user_id = $row_query['user_id'];

        if (!isset($_GET['edit_account']) && !isset($_GET['my_orders']) && !isset($_GET['delete_account'])) {
            $get_orders = "SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status='pending'";
            $result_query_orders = mysqli_query($con, $get_orders);

            if (!$result_query_orders) {
                echo "Error: " . mysqli_error($con);
                return;
            }

            $row_count = mysqli_num_rows($result_query_orders);
            if ($row_count > 0) {
                echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                      <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
            } else {
                echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3>
                      <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
            }
        }
    }
}*/


       
?>