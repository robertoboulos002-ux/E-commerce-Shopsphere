<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin -Registration</title>
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
            Admin Registration
        </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/adminregister.png" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="Email" class="form-label fw-bold">Email</label>
                        <input type="email" id="Email" name="Email" placeholder="Enter your Email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_password" class="form-label fw-bold">Confirm password</label>
                        <input type="password" id="conf_password" name="conf_password" placeholder="Confirm your password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <input type="submit" class="bg-info py-2 px-3 border-0 text-light fw-bold" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_login.php" class="link-danger text-decoration-none">Login</a></p>
                               </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['admin_registration'])){
    $admin_name=$_POST['username']; // Corrected here
    $admin_email=$_POST['Email']; // Corrected here
    $admin_password=$_POST['password']; // Corrected here
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $conf_password=$_POST['conf_password'];
    

//select query
  
  $select_query="Select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Admin or Email already exist')</script>";
    }
    else if($admin_password!=$conf_password){
          echo "<script>alert('passwords not match')</script>";
    }
    
    else{
         
        //insert query
           
        $insert_query="insert into `admin_table` (`admin_name`, `admin_email`, `admin_password`) values ('$admin_name','$admin_email','$hash_password')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
           echo "<script>alert('Data inserted successfully')</script>";
           echo "<script>window.open('admin_login.php','_self')</script>";

        }else{
           die(mysqli_error($con));
        }
       }
      
}   
       
   
?>