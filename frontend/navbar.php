<?php 
 $GLOBALS['cart_total']=0;
foreach ($_SESSION as $name => $value){
    if($value>0){
       if(substr($name,0,8)=="product_"){
         $GLOBALS['cart_total']+=1;  
       }
    }
}

 ?>
<style>
   #search{
       background-color:#25BBAD;
   } 
    
    
</style>


          <div class="alert alert-primary" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="mb-0">Free shipping all over India no minimum order!.</p>
          </div>
       

<nav id="hideinapp"class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="/index.php">
        <i class="fa d-inline fa-lg fa fa-home"></i>
        <b>&nbsp;Nav Trading Company</b>
      </a>
       <form class="form-inline m-0" action="product.php">
          <input class="form-control mr-2" type="text" placeholder="Search Products" name="search">
          <!--<button id="search"class="btn btn-primary" type="submit">Search </button>-->
          </form>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent" >
        <ul class="navbar-nav" >
          <li class="nav-item" >
            <a class="nav-link" href="/index.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/index.php">
              <i class="fa d-inline fa-lg fa-envelope-o"></i> Contacts</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="cart.php">
              <i class="fa fa-fw fa-shopping-cart"></i>
              <!--<span class = "cart-quantity"></sapan>-->
              cart</a>
          </li>
         
        </ul>
        <?php $email =check_if_login();
        echo '<a class="btn navbar-btn ml-2 text-white btn-secondary" href="login.php"  >
          <i class="fa d-inline fa-lg fa-user-circle-o"></i>'.$email.'</a>';
          
          ?>
          

      </div>
    </div>
  </nav>