<?php 
include('backend/functions.php');?>

<html>
    
<head>
   <title><?php if(isset($_GET['product'])){echo $_GET['product'];}
    elseif(isset($_GET['search'])){echo $_GET['search'];} else echo 'Nav Trading Company';?> </title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
   <link rel="stylesheet" href="frontend/theme.css" type="text/css">
   <link rel="stylesheet" href="frontend/product_card.css" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script
          src="https://code.jquery.com/jquery-3.3.1.js"
          integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
          crossorigin="anonymous"></script>
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
   $( function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
  } );
  </script>
   
 <script>
    var fun = function(element) {
        $.ajax({
            type:"POST",
            url :"backend/cart_process.php",
            data: {item:$(element).attr('id')},
            success : function(msg){
               console.log("sarthak");
              //  alert(msg);
               $( "#dialog" ).dialog( "open" );
              var cart = Number($('.cart-quantity').html())
                $('.cart-quantity').html(cart+1);
            }
        });
    }
</script>
   
   


</head>
    
<body>
            
    <?php include('frontend/navbar.php');?>
    <style>
        .row{
            margin-bottom:25px;
        }
    </style>
    <div class="container">
	<div class="row">
        <div class="col-md-3">
   <form action="#" method="get">
                <div class="input-group">
                    <input class="form-control" id="system-search" name="search" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-search"></i>Search</button>
                    </span>
                </div>
            </form>
            </div>
            </div>
            </div>

    <div class="container">
        <div class="row">
            <?php
               if(isset($_GET['product'])){
                   product(); 
               }
                if(isset($_GET['search'])){
                   show_search_result();
               }
              
            ?>
       
        </div>
    </div>
    
     
    <?php include('frontend/footer.php');?>
    
     <script>
            function alrt(){
                       var msg = "Success! Item added to cart!";
                       alert(msg);  
                   }
    </script> 
    
    <?php 
          
    if(isset($_SESSION['added'])){
              echo '<script>
                         alrt();
                   </script>';
              unset($_SESSION['added']);
        
    }
          
          
     ?>  
     
     <div  id="dialog" title="Success!">
     <p class = "text-primary">Item added to cart!.</p>
</div>
            
 </body>
    
    
</html>


