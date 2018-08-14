<?php include('backend/functions.php');

 if(isset($_SESSION['email'])){
    if(isset($_SESSION["yesreadytocheckout"])){
        if($_SESSION["yesreadytocheckout"]>0){
            
        }
        else{
            header('Location: index.php');
        }
    }
    else{
        header('Location: index.php');
    }
}
else{
    header('Location: login.php?alreadyincart=0');
} 

 
     $error=0;
    $nerror="";
    $perror="";
    $aerror="";
    $cerror="";
    $serror="";
    $pierror="";
    $casherror="";

if(isset($_POST['movetopayment'])){
 
    
    if(empty(rtrim($_POST['uname']))){
        $nerror = '<div class="alert alert-danger"><strong>Name</strong> is required</div>';
        $error++;
    }
    if(empty(rtrim($_POST['uphone']))){
        $perror ='<div class="alert alert-danger"><strong>Phone number</strong> is required</div>';
        $error++;
    }
    
     if(empty(rtrim($_POST['uaddress']))){
        $aerror = '<div class="alert alert-danger"><strong>Address</strong> is required</div>';
        $error++;
    }
    
     if(empty(rtrim($_POST['ucity']))){
        $cerror= '<div class="alert alert-danger"><strong>City</strong> is required</div>';
        $error++;
    }
     if(empty(rtrim($_POST['ustate']))){
        $serror = '<div class="alert alert-danger"><strong>State</strong> is required</div>';
        $error++;
    }
    
     if(empty(rtrim($_POST['upostalcode']))){
        $pierror = '<div class="alert alert-danger"><strong>Pincode</strong> is required</div>';
        $error++;
    }
    if(empty($_POST['upayment'])){
        $error++;
        $casherror='<div class="alert alert-danger"><strong>Please select a payment option</strong></div>';
    }
    if($error==0){
            $email=$_SESSION['email'];
    $mob=$_POST['uphone'];
    $name=$_POST['uname'];
    $address=$_POST['uaddress']."<br>".$_POST['ucity']."<br>".$_POST['ustate']."<br>".$_POST['upostalcode']."<br>";

  $link = mysqli_connect("localhost","navtradi_sarthak","sarthak01","navtradi_development");
  $query= "UPDATE `users`
  SET name = '$name', address= '$address', phonenumber= '$mob'
  WHERE email = '$email'";

$result = mysqli_query($link, $query);

if($result){
    if($_POST['upayment']=="ucash"){
        
        $_SESSION['addressdone']=1;
        header('Location: thankyou.php');
    }
    else if($_POST['upayment']=="uonline"){
        
        header('Location: backend/payment/paypal.php');
    }
    
    
}
    
    
    
    }


    
    
}


    

?>

<html>
    
    <head><title>Home</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="frontend/theme.css" type="text/css">]
    <link rel="stylesheet" href="frontend/checkout.css" type="text/css">
    
    <style>
       img{ 
        
        height: 80px;
    width: 80px;
       }
    </style>
    
    </head>
    
    <body>
        
             
        <?php include('frontend/navbar.php');?>
        
<div class="container1" >
<div class="row"  >
    <div class="col-md-12 col-md-offset-4" style=" padding:100px width:100%">
      <form method="post" class="form-horizontal" role="form">
        <fieldset>

          <!-- Form Name -->
          <legend style="text-align:center margin-top:20px" >Address Details</legend>

          <!-- Text input-->
          
           <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Name </label>
            <div class="col-sm-10">
              <input name="uname" type="text" placeholder="Full Name " class="form-control"><?php echo $nerror; ?>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Address </label>
            <div class="col-sm-10">
              <input name="uaddress" type="text" placeholder="Address " class="form-control"><?php echo $aerror; ?>
            </div>
            
            
            
          </div>

         

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">City</label>
            <div class="col-sm-10">
              <input  name="ucity" type="text" placeholder="City" class="form-control"> <?php echo $cerror; ?>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">State </label>
            <div class="col-sm-4">
              <input  name="ustate" type="text" placeholder="State" class="form-control"><?php echo $serror; ?>
            </div>
            

            <label class="col-sm-2 control-label" for="textinput">Postcode </label>
            <div class="col-sm-4">
              <input  name="upostalcode" type="text" placeholder="Post Code" class="form-control"><?php echo $pierror; ?>
            </div>
          </div>
          

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Phone </label>
            <div class="col-sm-10">
              <input   name="uphone" type="text" placeholder="Phone Number" class="form-control"><?php echo $perror; ?>
            </div>
          </div>
          
          
          <div class="form-group">
                <div class="radio">
                    <label><input type="radio" name="upayment" value="ucash"><img src="https://4.imimg.com/data4/RC/YR/MY-8877598/cash-on-delivery-services-500x500.jpg"></label>
                </div>
                <div class="radio">
                        <label>
                            <input type="radio" name="upayment" value="uonline"><img src="https://i1.wp.com/s3-eu-west-1.amazonaws.com/leadersandco/wp-content/uploads/2016/05/16043149/OnlinePayments.png?fit=619%2C352&ssl=1"> Paytm wallet/Debit Cards</label>
                  </div>
                  <?php echo $casherror; ?>
                  
        </div>

          

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button  name="movetopayment" type="submit" class="btn btn-primary">Buy</button>
              </div>
            </div>
          </div>

        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
</div>
        
  <?php include('frontend/footer.php');?>
          
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  
  
  </html>