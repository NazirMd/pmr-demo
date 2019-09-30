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
    <a href="Index.php" class="logoproperties1">Plan My Route</a>

</div>

</div>
</nav>


    <div class="container mainpanel1" >        
           <div class="row" >
            <div class="col-lg-12">        
        <legend class="form_header" style="padding-top: 5px; padding-bottom:  10px;">
            <center><h3>Admin Console</h3></center></legend>
    </div></div>   
        <div class="row">
    <div class="cil-lg-12">
<div class="col-md-4">
</div>
        <div class="col-md-4 signuppanel">
<br>
<P class="text-center"><strong>LOG IN</strong></p>
<hr class="hrstyle">
<form class="form-horizontal" role="form" action="login_process.php" method="post">
<div class="form-group">
<div class="col-sm-12">
<input type="text" class="form-control" id="admin_user_name" name="admin_user_name" placeholder="Enter Registered Email">
</div>
</div>
<div class="form-group">
<div class="col-sm-12">
<input type="password" class="form-control" id="admin_user_pwd"  name="admin_user_pwd" placeholder="Enter password" >
</div>
</div>
<div class="form-group text-center">
<div class="col-sm-12">
<button type="submit" class="btn btn-primary" id="frlogin" name="frlogin">LOG IN</button>
<a href="register.php" class="btn btn-primary">REGISTER</a>
<a href="admin_forgot_password.php" class="btn btn-danger">FORGOT PASSWORD?</a>
<br>
<?php
$logininfo=filter_input(INPUT_GET,"msg");
if($logininfo){  ?>
<div style="text-align: center; font-weight:  600; color: #e30742"><?php echo $logininfo;?></div>
<?php } ?>
</div>
</div>
</form>
<br>
</div>
        
        <div class="col-md-4"></div>
    </div>

</div>
    </div>
    
 <?php 
 include "footer.php"
 ?>
 
    
</body>

</html>