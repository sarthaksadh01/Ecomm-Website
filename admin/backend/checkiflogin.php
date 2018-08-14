<?php
ob_start();
session_start();

if(isset($_SESSION['admin'])){
    
    if($_SESSION['admin']=="your password here"){
    }
    else{
        header("Location:/admin/adminlogin.php");
    }
    
    
}

 else{
        header("Location:/admin/adminlogin.php");
    }



?>