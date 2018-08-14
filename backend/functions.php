<?php
ob_start();
session_start();

$GLOBALS['total'] = 0;



// function to connect to database


function connect_to_database(){
    
        $link = mysqli_connect("your database details here");
        if( mysqli_connect_error()){
             die("error connecting to database..");
         }
    return $link;
    
}


// function to change nav bar sign up button

function check_if_login()
{
    if(isset($_SESSION['email'])){
        $email="My Profile";
        
    }
    
    else $email = "Sign up";
    
    return $email;
    
}


//---
//log in function
 $err="";
 
if(isset($_POST['submit'])){
   
    $errr = 0;
    if(empty(rtrim($_POST['email']))){
        $err = $err.'<div class="alert alert-danger">
  <strong>Email!</strong> is required
  </div>';
    $errr++;
    }
    
    if(empty(rtrim($_POST['password']))){
        $err =$err. '<div class="alert alert-danger">
  <strong>Password!</strong> is required
  </div>';
    $errr++;
    }
    
     if(strlen($_POST['password'])<8){
        $err = $err.'<div class="alert alert-danger">
  <strong>Short!</strong> Password must be atleast 8 character long!
  </div>';
    $errr++;
    }
    
    
    
    
    if($errr==0){
       $link=connect_to_database();
        if( mysqli_connect_error()){
             die("hello");
         }
            
                $query = "SELECT id FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {
                    
                    $query2 = "SELECT password FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
                     $result2=mysqli_query($link, $query2);
                     $row=mysqli_fetch_assoc($result2);
                    if($_POST['password']==$row['password']){
                        $_SESSION['email']=$_POST['email']; 
                         header("Location: index.php");
                    }
                    else{
                        
                        $error="Wrong Password";
                        echo '<div id ="sarthaksadh">'.$error.'</div';
                    }
 
                    

                } else {

                    $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";

                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } else {

                            $_SESSION['email']=$_POST['email'];
                            $_SESSION['password']=$_POST['password'];
                            header('Location: index.php');


                        header("Location: index.php");

                    }

                } 
    }
    


    
}


// if already log in go to my profile

function go_to_myprofile(){
    
if(isset( $_SESSION['email'])){
    if(isset($_GET["alreadyincart"])){
        header('Location: checkout.php');
    }
    else
    header('Location: myprofile.php ');
}
}

//contact us form------


if(isset($_POST['query_submit'])){
    $msg= '<p>'.$_POST["email"].'</p><p>'.$_POST["name"].'</p><p>'.$_POST["msg"].'</p>';
    mail("sarhaksadh01@icloud.com","query",$msg,"from".$_POST['name']." ");
        
    
    
}
// show all the category from database//--------


function categories(){
    
    

$link=connect_to_database();
$query = "SELECT * FROM `categories` ";
$result = mysqli_query($link, $query);
if($result){
     echo' 
     <style>
    
    .card-img-top{
    max-height:200px;
    max-width: 100%;
  vertical-align: top;
  position: relative;
  padding-top: 40px;
    }
     </style>
     <section id="team" class="pb-5">
         <div class="container">
          <h1 class="text-center mb-5 text-primary">Shop by Brands</h1>
        <div class="row">
        ';
        
    while( $row=mysqli_fetch_assoc($result)){
     echo'   

          
            <div class="col-xs-12 col-sm-6 col-md-4">
                
                <div class="card  " style="margin-bottom:20px">
                                <div class="card-body text-center">
                                   <p "><img id="c" class=" card-img-top" src='.$row["image"].' alt="'.$row["name"].'"></p>
                                    <a href="subcategories.php?category='.$row["name"].'" class="btn btn-primary bg-primary " style="width:100%" role="button">'.$row["name"].'</a>
                                    
                                </div>
                            </div>
                
            </div>';
    }
            
            

      echo'  </div>
    </div>
</section>';
}
 
 
}


// show all the subcategory of category selected---


function subcategory(){
    
$link=connect_to_database();
if( mysqli_connect_error()){
     die("hello");
 }

$query = "SELECT * FROM `".$_GET['category']."`";
$result = mysqli_query($link, $query);
if($result){
    
  
  
echo'
 <section id="team" class="pb-5">
         <div class="container">
        <!--<h5 class="section-title h1">OUR TEAM</h5>-->
        <div class="row">';
    
while($row=mysqli_fetch_assoc($result)){

    
            echo'<!-- Team member -->
            
               <div class="col-xs-12 col-sm-8 col-md-4">
                
                <div class="card  " style="margin-bottom:20px">
                                <a class=" text-primary card-body text-center" href="product.php?product='.$row["name"].'">'.$row["name"].'
                                    
                                    
                                </a>
                            </div>
                
            </div>';
}
            
          
  echo'</div>
    </div>
</section>';
}
}

//show all the product of of selected sub category

function product(){
    
    $link=connect_to_database();
if( mysqli_connect_error()){
     die("hello");
 }
$name=$_GET["product"];
$query = "SELECT * FROM `productsinfo` WHERE subcategory = '".$name."'";
$result = mysqli_query($link, $query);
if($result){
    echo '<style>
     .card-img-top{
     
     max-height:300px;
    vertical-align: top;
    position: relative;
 
    }
    h5{
        color:#15746B;
    }
    
    #mrp{
    
        float:right;
    }
    s{
        color:red;
    }
    
    </style>';
    while($row=mysqli_fetch_assoc($result)){
        if($row["mrp"]==0)$disc="N/A";
        else
        $disc = round(100*(($row["mrp"]-$row["price"])/$row["mrp"])) ;
        
    echo'
   
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="card" style="margin-bottom:30px">
            
                <a href="productdescription.php?product='.$row["id"].'">
                <div>'.$disc.'%off</div>
                <img class="card-img-top img-fluid" id="c" src= '.$row["image"].' alt="'.$row["name"].'"></img>
                    
                </a>
               
                <div class="card-content">
                    <h4 class="card-title">
                        <a href="productdescription.php?product='.$row["id"].'">'.$row["name"].'
                        </a>
                    </h4>
                    <h5>&#8377;'.$row["price"].' <span id="mrp"> MRP: <s>';if($row["mrp"]==0)$row["mrp"]="N/A";echo $row["mrp"].'</s></span></h5>
                </div>
                <div class="card-read-more">
                        <button id ='.$row["id"].' class="btn btn-link btn-block add-to-cart-btn" onclick = "fun(this)" >
                         Add to Cart

                        </button>
                </div>    
                </div>  
            
        </div>
        ';
    }
}
    
}


// product detailed view


function product_single_view(){
    
    $title="";
    
    echo'<style> #mrp{
    
        float:right;
    }
    s{
        color:red;
    }</style>';
    
    
   $link=connect_to_database();
if( mysqli_connect_error()){
     die("hello");
 }

$query = "SELECT * FROM `productsinfo` WHERE id = '".$_GET['product']."'";
$result = mysqli_query($link, $query);
if($result){
   $row=mysqli_fetch_assoc($result);

            echo'
            
            <div class="col-md-6 p-0">
          <div class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
              <div class="img-magnifier-container">
                <img id="myimage" src='.$row["image"].' atl="'.$row["name"].'" class="d-block img-fluid w-100">
                </div>
            </div>
             
              </div>
            </div>
      
          </div>
            
          <div class="align-self-center p-5 col-md-6">
            
          <h1 class="mb-4">'.$row["name"].'</h1>
          <p class="mb-5" >'.$row["description"].'
            </p>
          <h3>&#8377;'.$row["price"].' <span id="mrp"> MRP: <s>';if($row["mrp"]==0)$row["mrp"]="N/A";echo $row["mrp"].'</s></span></h3>
          <button id ='.$row["id"].' class="btn btn-lg btn-primary add-to-cart-btn" onclick = "fun(this)" >
                         Add to Cart

                        </button>
          
          <div class="card-read-more">
                      
        </div>
       
         
       
                ';
                $title=$row['name'];
          }
}



// show relataed products in detailed view page


function related_products(){
    
   
    
$link=connect_to_database();
if( mysqli_connect_error()){
     die("hello");
 }

$query = "SELECT * FROM `productsinfo` WHERE id = '".$_GET['product']."'";
$result = mysqli_query($link, $query);
if($result){
    
$row=mysqli_fetch_assoc($result);
$subcategory = $row['subcategory'];
$query2 = "SELECT * FROM `productsinfo` WHERE subcategory = '".$subcategory."'
ORDER BY
rand()
LIMIT 3";
$result2 = mysqli_query($link, $query2);
if($result2){
    
     echo '<style>
     .card-img-top{
     
     max-height:200px;
    vertical-align: top;
    position: relative;
 
    }
    
    </style>';
    
    while($row=mysqli_fetch_assoc($result2)){
        
       echo'<div class="col-md-3">
          <div class="card" style="margin-bottom:30px">
           <a href="?product='.$row["id"].'"> <img class="card-img-top" src='.$row["image"].' alt="'.$row["name"].'" width="100px">
            <div class="card-body">
              <h5 class="card-title">'.$row["name"].'</h5></a>
              <h7>&#8377;'.$row["price"].'</h7>
              <a  href="backend/cart_process.php?item='.$row["id"].'" class="btn btn-primary">Add to Cart</a>
            </div>
          </div>
        </div>'; 
        
    }
    
}

    
    
    
    
      

}
}


// show search result


function show_search_result(){
        
    $link=connect_to_database();
if( mysqli_connect_error()){
     die("hello");
 }
$search=$_GET["search"];
$query = "SELECT * FROM `productsinfo` 
WHERE (name LIKE '%$search%' 
    OR category LIKE '%$search%' 
    OR subcategory LIKE '%$search%'  
    OR description LIKE '%$search%')";
$result = mysqli_query($link, $query);
if($result){
    echo '<style>
     .card-img-top{
     
     max-height:300px;
    vertical-align: top;
    position: relative;
 
    }
    h5{
        color:#15746B;
    }
    
    #mrp{
    
        float:right;
    }
    s{
        color:red;
    }
    
    </style>';
    while($row=mysqli_fetch_assoc($result)){
        if($row["mrp"]==0)$disc="N/A";
        else
        $disc = round(100*(($row["mrp"]-$row["price"])/$row["mrp"])) ;
    echo'
   
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="card" style="margin-bottom:30px">
            
                <a href="productdescription.php?product='.$row["id"].'">
                <div>'.$disc.'%off</div>
                <img class="card-img-top img-fluid" id="c" src= '.$row["image"].' alt="'.$row["name"].'"></img>
                    
                </a>
               
                <div class="card-content">
                    <h4 class="card-title">
                        <a href="productdescription.php?product='.$row["id"].'">'.$row["name"].'
                        </a>
                    </h4>
                    <h5>&#8377;'.$row["price"].' <span id="mrp"> MRP: <s>';if($row["mrp"]==0)$row["mrp"]="N/A";echo $row["mrp"].'</s></span></h5>
                </div>
                <div class="card-read-more">
                       <button id ='.$row["id"].' class="btn btn-link btn-block add-to-cart-btn" onclick = "fun(this)" >
                         Add to Cart

                        </button>
                </div>    
                </div>  
            
        </div>
        ';
    }
}
    
}


// show cart information
function show_cart(){

$link=connect_to_database();
if( mysqli_connect_error()){
     die("hello");
 }


foreach ($_SESSION as $name => $value){
    
    if($value>0){
    if(substr($name,0,8)=="product_"){
       $ar=explode("_",$name); 
        $length = strlen($name-8);
       // $id=substr($name,8,$length);
       $id=$ar[1];
        $query = "SELECT * FROM `productsinfo` WHERE id = '$id' ";
$result = mysqli_query($link, $query);

if($result){
   
    $row=mysqli_fetch_assoc($result);
    
   echo ' <tr>
						<td><img src='.$row["image"].' alt="'.$row["name"].'" class="img-responsive" style="height:100px ; width:80px; padding-right:5px;" />
						</td>
							<td data-th="Product" >
								 
							
										
									
							'.$row["name"].' 
								 
								 
							</td>
							<td data-th="Price">&#8377;'.$row["price"].'</td>
							<td data-th="Quantity">
								<a href="backend/cart_process.php?minus='.$row["id"].'" class="btn btn-info btn-sm"><i class="fa fa-minus"></i></a>'.$_SESSION["product_".$row["id"]].'<a  href="backend/cart_process.php?add='.$row["id"].'" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></a> 
							</td>
							<td data-th="Subtotal" class="text-center">&#8377;'.$row["price"]*$_SESSION["product_".$row["id"]].'</td>
							<td class="actions" data-th="">
								<a href="cart.php"  class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></a>
								<a href="backend/cart_process.php?delete='.$row["id"].'" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>								
							</td>
						</tr>';
		 $GLOBALS['total']+=$row["price"]*$_SESSION["product_".$row["id"]];
        
        
}
        
    }
    }
} 
$_SESSION["yesreadytocheckout"]=$GLOBALS['total'];

}


function total_cart(){
    if($GLOBALS['total']>0){
    
    	echo
    	        '<tfoot>
						<tr class="visible-xs">
						
						</tr>
						<tr>
							<td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total &#8377;'.$GLOBALS['total'].'</strong></td>
							<td><a href="checkout.php?checkout='.$GLOBALS['total'].'" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>';
					$_SESSION["yesreadytocheckout"]=$GLOBALS['total'];
    
}
else{
    echo'
    <style>
    #cart{
       
        width:100%;
    }
    </style>
    <div class="container1">
    <img id="cart" src=" https://www.livekingdomhall.com/public/images/empty-cart.jpg" class="img-rounded" alt="Empty cart">
    </div>
    ';

}


}


function show_my_profile(){
    
   $link=connect_to_database();
   
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
  
}

 




    
    
// showin my orders to user
function show_my_orders(){
    $email =$_SESSION['email'];
  $link=connect_to_database();
    if( mysqli_connect_error()){
     die("hello");
    }
    
    
 $query = "SELECT * FROM `seller_orders` WHERE email = '".$email."'";
 $result = mysqli_query($link, $query);
 if($result){
     while($row=mysqli_fetch_assoc($result)){
         
           echo '  <div class="col-md-12">
          <div class="card" style="margin-bottom:20px">
            <div class="card-header bg-primary"> Order &nbsp;#'.$row["id"].' </div>
            <div class="card-body">
        <h6 class="text-muted">Order date: '.$row["date"].'</h3>    
              <h4 class="">Order detail :'.$row["info"].'</h4>
              <h6 class="text-muted">Total amount :&#8377;'.$row["totalamount"].'</h6>
              <p class="text-primary">'.$row["status"].'</p>
            </div>
          </div>
        </div>';
     }
   
 }


    
  
    
}

// show title to product section
function show_title_product(){
    
     $link=connect_to_database();
if( mysqli_connect_error()){
     die("hello");
 }

$query = "SELECT * FROM `productsinfo` WHERE id = '".$_GET['product']."'";
$result = mysqli_query($link, $query);
if($result){
   $row=mysqli_fetch_assoc($result);
  return $row['name']; 
}

}
?>