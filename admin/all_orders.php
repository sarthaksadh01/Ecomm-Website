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
                   
                   <th>Order Number</th>
                     <th>Address</th>
                     <th>Email</th>
                     <th>Phone Number</th>
                     <th>Order Detail</th>
                     <th>Total Ammount</th>
                      <th>Packed</th>
                      <th>Cancel</th>
                      <th> Print Invoice</th>
                   </thead>
    <tbody>

   <?php
   
    $link = connect_to_database();
if( mysqli_connect_error()){
     die("hello");
 }

$query = "SELECT * FROM `seller_orders`";
$result = mysqli_query($link, $query);
if($result){
    
    while($row=mysqli_fetch_assoc($result)){
        echo'<tr>
    
    <td>'.$row["id"].'</td>
    <td>'.$row["address"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["phonenumber"].'</td>
    <td> '.$row["info"].'</td>
    <td>'.$row["totalamount"].'</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-info btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-gift"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    <td><a href ="invoice.php?bil='.$row["id"].'" class="btn btn-default btn-xs" > <span class="glyphicon glyphicon-print"></span></a></td>
    </tr>';
       //  <p data-placement="top" title="Delete"> data-toggle="tooltip"  data-title="Delete" data-toggle="modal" data-target="#delete" 
        
    }
    
}
   
   
   ?> 
 
    
   
    
    </tbody>
        
</table>


        
        
    </body>
    
    
</html>