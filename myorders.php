<?php include('backend/functions.php');?> 

<html>
    
    <head><title>Home</title>
             <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
          <link rel="stylesheet" href="frontend/theme.css" type="text/css">
          <link rel="stylesheet" href="frontend/cart.css" type="text/css">
          <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    
    
    </head>
    
    <body>
        
        <?php include('frontend/navbar.php');?>  
      
  <div class="py-5 ">
    <div class="container " >
      <div class="row">
      <?php show_my_orders();?>
        
      
        <!-- ss -->

        <!-- <div class="col-md-12">-->
        <!--  <div class="card">-->
        <!--    <div class="card-header bg-primary"> Order &nbsp;#53 </div>-->
        <!--    <div class="card-body">-->
        <!--      <h4 class="">Order detail :&nbsp;Demo</h4>-->
        <!--      <h6 class="text-muted">Total amount : $14</h6>-->
        <!--      <p class="text-primary">Shipped</p>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
      
    </div>
  </div>


         <?php include('frontend/footer.php');?>
        
        
        
        
        
        
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
        
    </body>
    
    
</html>
  
  