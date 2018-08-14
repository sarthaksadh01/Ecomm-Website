<?php
session_start();

// if(isset($_GET['item'])){
//           $_SESSION["product_".$_GET['item']]=1;
//       header('Location: ' . $_SERVER['HTTP_REFERER']);
//       $_SESSION['added']="yes";
//       //echo "product_".$_GET['item'];
// }

if(isset($_POST['item'])){
          if(isset($_SESSION["product_".$_POST['item']])){
              $_SESSION["product_".$_POST['item']]+=1;
          }
          else
          $_SESSION["product_".$_POST['item']]=1;
          
          echo "Item added to cart";
}

if(isset($_GET['add'])){
  $_SESSION["product_".$_GET['add']]++; 
  header('Location: ' . $_SERVER['HTTP_REFERER']); 
}

if(isset($_GET['minus'])){
    if($_SESSION["product_".$_GET['minus']]>0){
        
    $_SESSION["product_".$_GET['minus']]--; 
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']); 
    
    
}

if(isset($_GET['delete'])){
    $_SESSION["product_".$_GET['delete']]=0;
    header('Location: ' . $_SERVER['HTTP_REFERER']); 
    
}







?>