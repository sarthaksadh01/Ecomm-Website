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
      
       <form method="post">
          <div class="form-group">
            <label for="exampleFormControlInput1">Enter Category</label>
            <input type="text" class="form-control" name="category" >
          </div>
          
          <div class="form-group">
            <label for="exampleFormControlInput1">Enter Subcategory</label>
            <input type="text" class="form-control" name="subcategory" >
          </div>
          <button type = "submit" name="submit" >Submit</button>
          
        </form>  
        
        
        <?php 
        if(isset($_POST['submit'])){
                $link = mysqli_connect("localhost","navtradi_sarthak","sarthak01","navtradi_development");
                    if( mysqli_connect_error()){
                         die("hello");
                     }
       
      $category=$_POST['category']; 
      $sub=$_POST['subcategory'];
     $query = "INSERT INTO `$category` (name)
VALUES ('$sub')";
                  $result = mysqli_query($link, $query);
                    if($result){
                        

    
    echo '<div class="alert alert-success">
  <strong>Success!</strong> Subcategory added successfully!';
}

        
        
        }     
        
        
        ?>
        
        
        
    </body>
    
    
</html>