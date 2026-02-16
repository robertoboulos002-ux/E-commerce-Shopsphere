<?php

if(isset($_GET['delete_order'])){
    $delete_id=$_GET['delete_order'];
   // echo $delete_id;
   //delete query

   $delete_orders="delete from `user_orders` where order_id=$delete_id";
   $result_order=mysqli_query($con,$delete_orders);
   if($result_order){
    echo "<script>alert('Order Deleted')</script>";
    echo "<script>window.open('./index.php','_self')</script>";
   }

}

?>