<?php include('backend/functions.php');
?>

<html>
    
    <head><title>Return Policy</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="frontend/theme.css" type="text/css">
    <style>.timeline {
    list-style: none;
    padding: 20px 0 20px;
    position: relative;
}

    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eeeeee;
        left: 50%;
        margin-left: -1.5px;
    }

    .timeline > li {
        margin-bottom: 20px;
        position: relative;
    }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li > .timeline-panel {
            width: 46%;
            float: left;
            border: 1px solid #d4d4d4;
            border-radius: 2px;
            padding: 20px;
            position: relative;
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        }

            .timeline > li > .timeline-panel:before {
                position: absolute;
                top: 26px;
                right: -15px;
                display: inline-block;
                border-top: 15px solid transparent;
                border-left: 15px solid #ccc;
                border-right: 0 solid #ccc;
                border-bottom: 15px solid transparent;
                content: " ";
            }

            .timeline > li > .timeline-panel:after {
                position: absolute;
                top: 27px;
                right: -14px;
                display: inline-block;
                border-top: 14px solid transparent;
                border-left: 14px solid #fff;
                border-right: 0 solid #fff;
                border-bottom: 14px solid transparent;
                content: " ";
            }

        .timeline > li > .timeline-badge {
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            top: 16px;
            left: 50%;
            margin-left: -25px;
            background-color: #999999;
            z-index: 100;
            border-top-right-radius: 50%;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            border-bottom-left-radius: 50%;
        }

        .timeline > li.timeline-inverted > .timeline-panel {
            float: right;
        }

            .timeline > li.timeline-inverted > .timeline-panel:before {
                border-left-width: 0;
                border-right-width: 15px;
                left: -15px;
                right: auto;
            }

            .timeline > li.timeline-inverted > .timeline-panel:after {
                border-left-width: 0;
                border-right-width: 14px;
                left: -14px;
                right: auto;
            }

.timeline-badge.primary {
    background-color: #2e6da4 !important;
}

.timeline-badge.success {
    background-color: #3f903f !important;
}

.timeline-badge.warning {
    background-color: #f0ad4e !important;
}

.timeline-badge.danger {
    background-color: #d9534f !important;
}

.timeline-badge.info {
    background-color: #5bc0de !important;
}

.timeline-title {
    margin-top: 0;
    color: inherit;
}

.timeline-body > p,
.timeline-body > ul {
    margin-bottom: 0;
}

    .timeline-body > p + p {
        margin-top: 5px;
    }

@media (max-width: 767px) {
    ul.timeline:before {
        left: 40px;
    }

    ul.timeline > li > .timeline-panel {
        width: calc(100% - 90px);
        width: -moz-calc(100% - 90px);
        width: -webkit-calc(100% - 90px);
    }

    ul.timeline > li > .timeline-badge {
        left: 15px;
        margin-left: 0;
        top: 16px;
    }

    ul.timeline > li > .timeline-panel {
        float: right;
    }

        ul.timeline > li > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        ul.timeline > li > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
}</style>
    
    
    
    </head>
    
    <body>
        <?php include('frontend/navbar.php');?>
        <!-- <p>*Every order comes with a order numbern Please fillup the form at the end of this providing the order number and reason for return.</p>-->
        <!-- <p>After that you will recieve information regarding the same</p>-->
        <!-- <p>Once we recieve the product we will issue the refund!</p>-->
        <div class="container">
    <div class="page-header">
        <h1 id="timeline">Return Policy</h1>
    </div>
    <ul class="timeline">
        <li>
          <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">What returns we accept</h4>
             
            </div>
            <div class="timeline-body">
              <p>We accept returns within 7 days of the order.</p>
              <p>We Do not accept Sanitaryware and other Cera products as they can be damaged while shipping</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">How to return</h4>
            </div>
            <div class="timeline-body">
              <p>Please ensure while returning the product the packaging is intact the way it was delivered</p>
              <p>We currently do not provide pick up services for return order</p>
             <p> Every order comes with an order number Please fillup the form at the end of this page providing the order number and reason for return</p> 
             <p>After we verify your return request you will recieve a mail regarding the same</p>
            </div>
          </div>
        </li>
       

        <li>
          <div class="timeline-badge success"><i class="glyphicon glyphicon-floppy-disk"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Refund</h4>
            </div>
            <div class="timeline-body">
              <p>Once we received the product.We will release the refund for the same .</p>
              <hr>
             
            </div>
          </div>
        </li>
       
    </ul>
</div>



<div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary" >
            <div class="card-body">
              <h1 class="mb-4">Return Form</h1>
              <form method = "post">
                <div class="form-group">
                  <label>Order id</label>
                  <input  name="orderid" type="text" class="form-control" placeholder="Enter order id"> </div>
                <div class="form-group">
                  <label>Reason for return</label>
                  <textarea name="reason" row="40" class="form-control form-control-lg" placeholder="Reason"></textarea> </div>
                <button name="return_submit" type="submit" class="btn btn-secondary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        
        <?php 
        $error_return="";
        if(isset($_POST['return_submit'])){
            
            $id = $_POST['orderid'];
        
        $link = connect_to_database();
        $query = "SELECT * FROM `seller_orders` WHERE id ='$id'";
        $result=mysqli_query($link,$query);
        
        if (mysqli_num_rows($result) > 0){
            
            $date=date("Y-m-d");
             $query2 = "SELECT date FROM `seller_orders` WHERE id = '$id' LIMIT 1";
                     $result2=mysqli_query($link, $query2);
                     if($result2){
                         $row=mysqli_fetch_assoc($result2);
                         $date2=$row['date'];
                        $diff= abs(strtotime($date) - strtotime($date2));
                        $years = floor($diff / (365*60*60*24));
                        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

                        if($days>7){
                            
                        }
                        else{
                            $error_return.="Can not retun as order date is $days ago";
                        }
                         
                     }
                    
            
        }
        
        else{
            $error_return.="Order id does not exist<br>";
        }
            
            
            
            
        }
        
        echo $error_return;
        
        
        
        
        
        ?>
        
        
        
         <?php include('frontend/footer.php');?>
          
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  
  
  </html>