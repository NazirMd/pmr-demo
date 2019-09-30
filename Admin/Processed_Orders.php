<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$PIDValue= $_SESSION['PID'];

$rownumber=1;

include_once './Logging.php';
include_once './Db_Operations.php';
$menulist = new Db_Operations();

$result = $menulist->GetProcessedOrders($PIDValue);

if(isset($_POST['sortdesc']))
{
$result = $menulist->ReadProcessedOrdersCreateDesc($PIDValue);
}
if(isset($_POST['sortpricedesc'])) {
$result = $menulist->ReadProcessedOrdersPriceDesc($PIDValue);
}
if(isset($_POST['sortpriceasc'])) {
$result = $menulist->ReadProcessedOrdersPriceAsc($PIDValue);
}
if(isset($_POST['sortmenuitemname'])) {
$result = $menulist->ReadProcessedOrderNameAsc($PIDValue);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="wantreform.org - Login">
<meta name="keywords" content="wantreform Login">
<title>Plan My Route</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="app-css/modern-business.css" rel="stylesheet">
<script src="js/jquery-1.10.2.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,900italic,900,700italic,700,500italic,500,400italic,300italic,100,100italic,300' rel='stylesheet' type='text/css'>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.validate.js"></script>
</head>
<body>
   <?php
    include './header_post_login.php'
    ?>   
    <div class="container mainpanel1">
        
  
      <div class="row"><div class="col-lg-12">        
        <legend class="form_header" style="padding-top: 5px; padding-bottom:  10px;">
            <center><h3>Processed Order List</h3></center></legend>
    </div></div> 
        
        
        <?php        
                
        $num_rows = mysqli_num_rows($result);             
        if($num_rows==0)
        {
        ?>
        <div class="row">
        <div class="col-md-12 text-center">
        <h3>There are no processed orders available</h3>
        </div>
        </div>
        <?php   
        }
        else if($num_rows>0)
        {         
        ?>
        
        
        
   <div class="text-center" style="color: #000000; font-size: 18px; margin: 10px; " >Note: ' Allergy Prone Ingredients [Exclusion list] ' should be compulsory excluded while preparing the dish.</div>     
        
        <div class="row" style="margin-bottom: 20px;">
<div class="col-lg-12">
    <form action="Processed_Orders.php" method="post">
<button class="btn btn-primary" name="sortdesc">Sort by Creation Order: Descending </button>
<button class="btn btn-primary" name="sortmenuitemname">Sort by Order Name</button>
<button class="btn btn-primary" name="sortpricedesc">Sort By Price: Higher - Lower</button>
<button class="btn btn-primary" name="sortpriceasc">Sort By Price: Lower - Higher</button>
</form>
</div>
</div>
<div class="bs-example">
    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Order Id</th>
                <th>Order Name</th>
                <th style="background-color: #F00000; color: #ffffff;">Allergy Prone Ingredients [Exclusion list]</th>
                <th>Image</th>
                <th>Order Price</th>
                <th>Order Quantity</th>
                <th>Total Amount</th>                              
                <th>Order Reservation_Date</th>                
                <th>Order Scheduled_Time</th>
                <th>Restaurant_Name</th>
                <th>Processed_Y_N</th>
             
            </tr>
        </thead>
        <tbody >
            
            <?php
            
                while($row  = mysqli_fetch_assoc($result))
                
                { 
            ?>
            
            
            <tr>
                <td><?php echo $rownumber++;?></td>
                <td><?php echo $row['Order_Id']?></td>
                <td><?php echo $row['Order_Name']?></td>
                <td><?php echo $row['Allergy_Ingredient']?></td>
                <td class="thumbnail img-rounded" style="width: 100px; height: 75px;"> <?php echo "<img src='" . $row['Order_Image']."' >" ?></td>
                <td><?php echo $row['Order_Price']?></td>
                <td><?php echo $row['Order_Quantity']?></td>
                <td><?php echo $row['Total_Amount']?></td>                
                <td><?php echo $row['Order_Reservation_Date']?></td>
                
                <td><?php echo $row['Order_Scheduled_Time']?></td>
                
                <td><?php echo $row['Restaurant_Name']?></td>                
                <td><?php 
                            if($row['Processed_Y_N']==0)
                            {
                            echo 'NO';
                            }
                            else echo'YES'; 
                            ?>
                            </td>
              
                
            </tr>            
            
            <?php            
        } }
             //   mysqli_close($conn);
                
                ?>
        </tbody>
    </table>
</div>
    </div>
    
      <?php
  
  include 'footer.php';
  ?>
    
</body>
</html>                                		