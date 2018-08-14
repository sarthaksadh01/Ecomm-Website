<?php
ob_start();
session_start();

if(isset($_POST['submit'])){
    if($_POST['admin']=="your password here"){
     $_SESSION['admin'] =  $_POST['admin'];
     header("Location:https://bootsnipp.com/snippets/qrQRB");
     //echo "jbdcbzxc";
    }
    else echo "error";
    if(isset($_SESSION['admin'])){
        if($_SESSION['admin']=="Sarthak01@"){
             header("Location:index.php");
        }
        
    }
    
}


?>