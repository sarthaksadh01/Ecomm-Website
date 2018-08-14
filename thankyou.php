<?php 
ob_start();
session_start();
if(isset($_SESSION['addressdone'])){
    
}
else{
    die;
}
?>

<html>
    
    <head><title>Home</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
   
  <link rel="stylesheet" href="frontend/theme.css" type="text/css">
  <link rel="stylesheet" href="frontend/cards.css" type="text/css">
  
  
 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>.animationload {
    background-color: #fff;
    height: 30%;
    left: 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 10000;
}
.osahanloading {
    animation: 1.5s linear 0s normal none infinite running osahanloading;
    background: #fed37f none repeat scroll 0 0;
    border-radius: 50px;
    height: 50px;
    left: 50%;
    margin-left: -25px;
    margin-top: -25px;
    position: absolute;
    top: 50%;
    width: 50px;
}
.osahanloading::after {
    animation: 1.5s linear 0s normal none infinite running osahanloading_after;
    border-color: #85d6de transparent;
    border-radius: 80px;
    border-style: solid;
    border-width: 10px;
    content: "";
    height: 80px;
    left: -15px;
    position: absolute;
    top: -15px;
    width: 80px;
}
@keyframes osahanloading {
0% {
    transform: rotate(0deg);
}
50% {
    background: #85d6de none repeat scroll 0 0;
    transform: rotate(180deg);
}
100% {
    transform: rotate(360deg);
}
}
</style>


    </head>
    
    <body>
    

 <div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <br><br><br><br>        <br><br> <br><br><br><br>
        <br><br> 

        
        <h3>Dear, User</h3>
        <p  class="alert alert-success" style="font-size:20px;">Thank you for Placing your order please do not close this window we will redirect you after we verify your details!....</p>
     
    <br><br>
    <br>
    <br>
    <br>
       <br><br>
    <br>
    <br>
    <br>
        </div>
        
	</div>
</div>


<div class="container">
	<div class="row">
	   
        <div class="animationload">
            <div class="osahanloading"></div>
        </div>
	</div>
</div>

 


 <?php
 $flag=0;
 
$link = mysqli_connect("localhost","navtradi_sarthak","sarthak01","navtradi_development");
if( mysqli_connect_error()){
     die("hello");
 }
 
$email=$_SESSION['email']; 
 $mob;
 $tot=0;
 $info="<br>";
 $address;
$query = "SELECT * FROM `users` WHERE email = '$email' ";

$result = mysqli_query($link, $query);

if($result){
    $row=mysqli_fetch_assoc($result);
    $mob=$row['phonenumber'];
    $address=$row['address'];
    $flag=1;
    
}

if($flag==1){
    
 
foreach ($_SESSION as $name => $value){
    
    if($value>0){
    if(substr($name,0,8)=="product_"){
        
        $length = strlen($name-8);
        $id=substr($name,8,$length);
        $query = "SELECT * FROM `productsinfo` WHERE id = '$id' ";
        $result = mysqli_query($link, $query);

if($result){
   
    $row=mysqli_fetch_assoc($result);
    $info = $info.$row['name']."     ".$row['price']."   "."  &#215;".$_SESSION['product_'.$row['id']]."<br>";
    $tot = $tot + $row["price"]*$_SESSION["product_".$row["id"]];
        
}
        
    }
    }
} 

$flag=2;

    
}

if($flag==2){

$date=date("Y-m-d");
  $query= "INSERT INTO `seller_orders`  ( phonenumber, address, info, totalamount, email,status,date)
VALUES ('$mob', '$address', '$info', '$tot', '$email','placed','$date')";

$result = mysqli_query($link, $query);
if($result){
    $flag=3;
}  
}

if($flag==3){
    foreach ($_SESSION as $name => $value){
        
         if(substr($name,0,8)=="product_"){
             
        unset($_SESSION[$name]);
    }
    
}
unset($_SESSION['addressdone']);
$GLOBALS["total_cart"]=0;
unset($_SESSION["yesreadytocheckout"]);
$flag++;
}


if($flag==4){
   //echo"saxasxasxasxasxasx";
  header( "refresh:5;url=index.php" );
}
else{

echo '<p  class="alert alert-danger" style="font-size:20px;">Error! please contact customer care!. ....</p>
     ';
}






?>
        
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
        
    </body>
    
    
</html>
