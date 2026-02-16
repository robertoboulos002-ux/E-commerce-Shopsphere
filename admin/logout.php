<?php
//start the session then destroy

session_start();
session_unset();
session_destroy();
echo "<script>window.open('../admin/admin_login.php','_self')</script>";




?>