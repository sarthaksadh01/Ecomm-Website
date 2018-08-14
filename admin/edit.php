<?php
include("backend/checkiflogin.php");
include("backend/functions.php"?>
<html>
    <head>
        <title>Admin</title>
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<style>
    
    img{
        height:50px;
        width:50px;
    }
    
</style>

    </head>
    
    <body>
        <?php include("frontend/navbar.php");?>
      

   <?php
   if(isset($_GET['id'])){
       
   
  $link = connect_to_database();
if( mysqli_connect_error()){
     die("hello");
 }
$id=$_GET['id'];
$query = "SELECT * FROM `productsinfo` WHERE id='$id'";
$result = mysqli_query($link, $query);

if($result){
    $row=mysqli_fetch_assoc($result);
    echo'
    
    
    <div id="page-wrapper">

            <div class="container-fluid">

<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Edit Product

</h1>
</div>
               


<form action="backend/edit_confirm.php" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
       <textarea name="title" id=""  class="form-control">'.$row["name"].'</textarea>
       
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="description" id="" cols="30" rows="10" class="form-control">'.$row["description"].'</textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="price" class="form-control" size="60" value='.$row["price"].'>
      </div>
    </div>
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
      
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
        <textarea  name="category" class="form-control">'.$row["category"].'</textarea>
    
</div>





    <div class="form-group">
      <label for="product-title">Product Subcategory</label>
         <textarea  name="subcategory" class="form-control">'.$row["subcategory"].'</textarea>
        
    </div>
    
     <div class="form-group">
     
         <input type ="hidden"  name="id" class="form-control">'.$id.'>
        
    </div>


    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="fileToUpload">
      
    </div>


    <div class="form-group">

     
        <label for="product-quantity">Product Quantity</label>
        <input type="number" name="quantity" size = "60" class="form-control" value='.$row["quantity"].'>
      </div>
    </div>
    

</aside>


    
</form>



                



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->'
;
        
    }
    

   }
   
   
   
   if(isset($_GET['delete'])){
       $delete=$_GET['delete'];
          
     $link = mysqli_connect("localhost","navtradi_sarthak","sarthak01","navtradi_development");
if( mysqli_connect_error()){
     die("hello");
 }

$query = "DELETE FROM `productsinfo`
WHERE id='$delete'";
$result = mysqli_query($link, $query);
if($result){
    header("Location: allproducts.php");
}

   }
   
   ?> 
 
<!--//     <form method="post" action="edit_confirm.php">-->
<!--//   <div class="form-group">-->
<!--//     <label for="exampleFormControlInput1">Product Title</label>-->
<!--//     <input type="text" class="form-control" name="title" value="'.$row["name"].'" >-->
<!--//   </div>-->
  
<!--//   <div class="form-group">-->
<!--//     <label for="exampleFormControlInput1">Product Category</label>-->
<!--//     <input type="text" class="form-control" name="category" value='.$row["category"].' >-->
<!--//   </div>-->
<!--//   <div class="form-group">-->
<!--//     <label for="exampleFormControlInput1">Product Subcategory</label>-->
<!--//     <input type="text" class="form-control" name="subcategory" value='.$row["subcategory"].' >-->
<!--//   </div>-->
<!--//   <div class="form-group">-->
<!--//     <label for="exampleFormControlInput1">Product Image</label>-->
<!--//     <input type="text" class="form-control" name="image" value='.$row["image"].' >-->
<!--//   </div>-->
<!--//   <div class="form-group">-->
<!--//     <label for="exampleFormControlInput1">Product Price</label>-->
<!--//     <input type="text" class="form-control" name="price" value='.$row["price"].'>-->
<!--//   </div>-->
<!--//   <div class="form-group">-->
<!--//     <label for="exampleFormControlInput1">Product Quantity</label>-->
<!--//     <input type="text" class="form-control" name="quantity" value='.$row["quantity"].' >-->
<!--//   </div>-->
<!--//   <div class="form-group">-->
<!--//     <label for="exampleFormControlInput1">Product Description</label>-->
<!--//     <textarea row="5" type="text"  class="form-control form-control-lg" name="description"  value='.$row["description"].' ></textarea>-->
  
<!--//   </div>-->
  
<!--//   <div class="form-group">-->
<!--//   <input  type="hidden"  class="form-control form-control-lg" value="'.$id.'" name="id">-->
<!--//   </div>-->
  
<!--//   <div class="form-group">-->
<!--//     <button type="submit" name="submit">SUBMIT</button>-->
<!--//   </div>-->


<!--// </form>'-->

  
    
        
        
    </body>
    
    
</html>