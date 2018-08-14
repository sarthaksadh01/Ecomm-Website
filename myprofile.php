<?php include('backend/functions.php');
if(isset($_SESSION['email'])){
    
}
else{
    header("Location: index.php");
}
?> 
<html>
    
    <head><title>Home</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="frontend/theme.css" type="text/css">
  
    
    <style>
        .center{
            text-align:center;
        }
        .width{
            width:50%;
           
        }
        .height{
             height:500px;
        }
        .left{
            float:left;
        }
        .border{
             border-bottom: none;
        }
        
       
}
    </style>
    
    
    </head>
    
    <body>
        
        <?php include('frontend/navbar.php');?>  
  <?php 
  
   $link = mysqli_connect("localhost","navtradi_sarthak","sarthak01","navtradi_development");
if( mysqli_connect_error()){
     die("hello");
 }
 
 $email=$_SESSION['email'];
$query = "SELECT * FROM `users` WHERE email = '$email' ";

$result = mysqli_query($link, $query);

if($result){
    $row =mysqli_fetch_assoc($result);
    echo '<div class="py-5">
    <div class="container1 ">
     
      <div class="row height">
        <div class="col-md-12 ">
          <div class="card ">
            <div class="card-header bg-primary center">My Profile</div>
            <div class="card-body">
               <div class="center"><i class="fa fa-user-circle  fa-5x " style="color:#12bbad"></i></div> <br>

              <h5 class="card-title center">Welcome '.$_SESSION["email"].'</h5>
              <!--<p class="card-text">Name :&nbsp;</p>-->
            </div>
            <ul class="list-group ">
                 <li class="list-group-item  ">Name: '.$row["name"].' </li>
              <li class="list-group-item  ">Mobile: '.$row["phonenumber"].'</li>
              <li class="list-group-item"> Address: '.$row["address"].'</li>
              <li class="list-group-item list-group-item center "style="float:left" >
                <a class="btn btn-primary" href="myorders.php" style="margin-right:20px">My Orders</a>
                <a class="btn btn-primary " href="backend/print.php">Log Out</a>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
 ';
}
  
  
  ?>
  
  
 
   <?php include('frontend/footer.php');?>
        
        
        
        
        
        
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
        
    </body>
    
    
</html>
  
  