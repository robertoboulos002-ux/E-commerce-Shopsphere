<?php

if(isset($_GET['delete_users'])){
    $delete_id=$_GET['delete_users'];
   // echo $delete_id;
   //delete query

   $delete_users="delete from `user_table` where user_id=$delete_id";
   $result_users=mysqli_query($con,$delete_users);
   if($result_users){
    echo "<script>alert('User Deleted')</script>";
    echo "<script>window.open('./index.php','_self')</script>";
   }

}

?>