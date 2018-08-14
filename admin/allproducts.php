<?php
include("backend/checkiflogin.php")
include("backend/functions.php");?>
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
        <div class="container">
	<div class="row">
		
        
        <div class="col-md-12">
        <h4>All Orders</h4>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th>id</th>
                     <th>Title</th>
                     <th>Category</th>
                     <th>Subcategory</th>
                     <th>Description</th>
                     <th>Price</th>
                      <th>Edit</th>
                      <th>Delete</th>
                     
                   </thead>
    <tbody>

   <?php
   
   $link = connect_to_database();
if( mysqli_connect_error()){
     die("hello");
 }

$query = "SELECT * FROM `productsinfo`";
$result = mysqli_query($link, $query);
if($result){
    
    while($row=mysqli_fetch_assoc($result)){
        echo'<tr>
    
    <td>'.$row["id"].'</td>
    <td>'.$row["name"].'</td>
    <td>'.$row["category"].'</td>
    <td>'.$row["subcategory"].'</td>
    <td> '.$row["description"].'</td>
    <td>'.$row["price"].'</td>
    
    <td><a href ="edit.php?id='.$row["id"].'" class="btn btn-default btn-xs" > <span class="glyphicon glyphicon-edit"></span></a></td>
    <td><a href ="edit.php?delete='.$row["id"].'" class="btn btn-danger btn-xs" > <span class="glyphicon glyphicon-trash"></span></a></td>
    </tr>';
       //  <p data-placement="top" title="Delete"> data-toggle="tooltip"  data-title="Delete" data-toggle="modal" data-target="#delete" 
        
    }
    
}
   
   
   ?> 
 
    
   
    
    </tbody>
        
</table>


        
        
    </body>
    
    
</html>