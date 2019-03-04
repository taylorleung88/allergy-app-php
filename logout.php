<?php   
session_start();  
unset($_SESSION['sess_user']);  
unset($_SESSION['sess_id']);
session_destroy();  
header("location:login.php");  
?> 