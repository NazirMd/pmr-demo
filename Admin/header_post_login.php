<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['username'])){
   header("Location:Index.php");
}

?>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
    <a href="admin_operations.php" class="logoproperties1">Plan My Route</a>

</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
    
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="dataupload.php">Create new Menu Item</a></li>
            <li><a href="menu_list.php">View / Edit Menu Item</a></li>          
            <li><a href="Enable_Menu_Item.php">Enable Menu Item</a></li>
        </ul>
      </li>
      
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="Order_List.php">Pending Orders</a></li>            
            <li><a href="Processed_Orders.php">Processed Orders </a></li>
            <li><a href="Order_Detail.php">Order Details</a></li>          
        </ul>
      </li>     

<li>
    <a href="update_admin_profile.php">Edit Admin Profile</a>
</li>    


 <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['username']?>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li>
        <a href="admin_logout.php">Log Out</a>
        </li>
            
        </ul>
      </li>     
  
</ul>
    
    
    
</div>
</div>
</nav>




