<?php include('backend/functions.php');
go_to_myprofile();
?>

<html>
    
    <head><title>Home</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="frontend/theme.css" type="text/css">
    
    
    
    
    </head>
    
    <body>
        
    
        
        <?php include('frontend/navbar.php');?>
        <?php echo $err;?>
      
         <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-4 bg-primary">
            <div class="card-body">
              <h3 class="mb-4" style="text-align:center">Login/Sign Up</h3>
              <form method ="post">
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control" placeholder="Enter email" name="email"> </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Password" name="password"> </div>
                <button type="submit" name="submit" class="btn btn-secondary btn-block"  >Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
  <?php include('frontend/footer.php');?>
          
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  
  
  </html>