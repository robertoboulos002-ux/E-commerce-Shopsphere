<?php
//start the session then destroy
session_start();
session_unset();
session_destroy();
echo "<script>window.open('../index.php','_self')</script>";

?>