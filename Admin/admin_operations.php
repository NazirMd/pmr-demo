<!DOCTYPE html>
<html>
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
    include './header_post_login.php';
    
    
    ?>   
    
<div class="container mainpanel1">
        
        <div class="row">
            <div class="col-lg-12">        
        <legend class="form_header" style="padding-top: 5px; padding-bottom:  10px;">
            <center><h3>Admin Console</h3></center></legend>
    </div></div>
        <div class="col-md-3">
            <h4>Admin Menu links</h4>
  <div class="list-group">
      <a href="dataupload.php" class="list-group-item active">
      <h4 class="list-group-item-heading">Create new Menu Item</h4>
      <p class="list-group-item-text">Create new menu item</p>
    </a>
      
      <a href="menu_list.php" class="list-group-item">
      <h4 class="list-group-item-heading">View / Edit Menu Item</h4>
      <p class="list-group-item-text">View / Edit Menu Item</p>
    </a>
      <a href="Enable_Menu_Item.php" class="list-group-item">
      <h4 class="list-group-item-heading">Enable Menu Item</h4>
      <p class="list-group-item-text">View / Enable Menu Item</p>
    </a>
  </div>
        </div>  
        
        
        <div class="col-md-3">
            <h4>Admin Order links</h4>
            
  <div class="list-group">
      
      <a href="Order_List.php" class="list-group-item active">
      <h4 class="list-group-item-heading">Pending orders</h4>
      <p class="list-group-item-text">View Pending order list</p>
    </a>
      <a href="Processed_Orders.php" class="list-group-item">
      <h4 class="list-group-item-heading">Processed orders</h4>
      <p class="list-group-item-text">View processed order list</p>
    </a>
      
      <a href="Order_Detail.php" class="list-group-item">
      <h4 class="list-group-item-heading">Order Details</h4>
      <p class="list-group-item-text">View / Process  orders</p>
    </a>
  </div>
            
        </div>
        
        
        <div class="col-md-3">
            <h4>Admin profile links</h4>
  <div class="list-group">
      <a href="update_admin_profile.php" class="list-group-item active">
      <h4 class="list-group-item-heading">Edit Admin profile</h4>
      <p class="list-group-item-text">Edit / Update Admin profile</p>
    </a>      
      
  </div>
        </div>
  </div>
    
      
    <?php
    
    include("footer.php");
    
    ?>
      
        
    </body>
</html>
