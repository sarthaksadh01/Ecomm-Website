<?php
include("backend/checkiflogin.php");?>
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
    </head>
    
    <body>
        <?php include("frontend/navbar.php");?>
        
        <div id="page-wrapper">

            <div class="container-fluid">






<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add Product

</h1>
</div>
               


<form action="backend/fileupload.php" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="name" class="form-control">
       
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="description" id=""  class="form-control"></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="price" class="form-control" size="60">
      </div>
    </div>

<div class="form-group row">

      <div class="col-xs-3">
        <label for="product-quantity">Product Quantity</label>
        <input type="number" name="quantity" class="form-control" size="60">
      </div>
    </div>



    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
        <input type="text" name="category" class="form-control">
        


</div>





    <div class="form-group">
      <label for="product-title">Product Subcategory</label>
         <input type="text" name="subcategory" class="form-control">
        
    </div>


    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="fileToUpload">
      
    </div>



</aside>


    
</form>



                



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    
    <div>
        All Categories
        
        <?php 
        
//             $link = mysqli_connect("localhost","id6384620_atoz","sarthak01","id6384620_atozwebsite");
// if( mysqli_connect_error()){
//      die("hello");
//  }

// $query = "SELECT * FROM `categories`";
// $result = mysqli_query($link, $query);
// if($result){
    
//     while($row = mysqli_fetch_assoc($result)){
//         echo $row["name"].'<br>';
//     }
    
// }
        
        
        ?>
        
    </div>

        
        </body>
        
        
</html>        