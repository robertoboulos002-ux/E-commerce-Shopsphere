<?php

include('../includes/connect.php');
include('../functions/common_function.php');
//if active start the session
@session_start();


/*

include('../includes/connect.php');
include('../functions/common_function.php');
session_start(); // Start the session

if(isset($_POST['admin_login'])){
    $admin_name = trim($_POST['username']); 
    $password = trim($_POST['password']);  

    $select_query="SELECT * FROM `admin_table` WHERE admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    
    if($row_count==1) { // Checking if user exists
        $row_data=mysqli_fetch_assoc($result);
        if(password_verify($password,$row_data['admin_password'])){
            $_SESSION['admin_name']=$admin_name; // Set admin session variable
            echo "<script>alert('Login Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            
        } else {
            echo "<script>alert('Invalid Password')</script>";
        }
    } else {
        echo "<script>alert('Invalid Username')</script>";
    }
}

*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin -Login</title>
    <!-- bootstrap css link -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow: hidden;
            overflow-y: auto;
        }
    </style>
    
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5 text-info">
            Admin Login
        </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin-login.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
                    </div>
                    
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
                    </div>
                    
                    <div class="form-outline mb-4">
                        <input type="submit" class="bg-info py-2 px-3 border-0 text-light fw-bold" name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Already have have an account? <a href="admin_registration.php" class="link-danger text-decoration-none">Register</a></p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['admin_login'])){
    $admin_name = trim($_POST['username']); // Trim whitespace
    $password = trim($_POST['password']);  // Corrected here
  
    $select_query="SELECT * FROM `admin_table` WHERE admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    
    if($row_count==1) { // Checking if user exists
        $row_data=mysqli_fetch_assoc($result);
        if(password_verify($password,$row_data['admin_password'])){
            $_SESSION['admin_name']=$admin_name;
            echo "<script>alert('Login Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            
        } else {
            echo "<script>alert('Invalid Password')</script>";
        }
    } else {
        echo "<script>alert('Invalid Username')</script>";
    }
   
}


?>
