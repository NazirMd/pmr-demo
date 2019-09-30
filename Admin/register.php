<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Plan My Route</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="app-css/modern-business.css" rel="stylesheet" type="text/css"/>
        <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <link href="app-css/modern-business.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="js/register_form_validate.js" type="text/javascript"></script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        
        <style>
 .error {
  color: #F00000;
  background-color: #FFF;
}
        </style>
        
        <script type="text/javascript">           
            
            
     function changetextbox()
{
    if (document.getElementById("restaurant_type").value === "Other") {
        
        document.getElementById("restaurant_type_other").style.display="block";
        document.getElementById("restaurant_type_other_label").style.display="block";
        
    } 
    
    else if (document.getElementById("restaurant_type").value !== "Other") {
        
        document.getElementById("restaurant_type_other").style.display="none";
        document.getElementById("restaurant_type_other_label").style.display="none";
        
    }
}
            
        </script>
        
        
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
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">

<li>
</ul>
</div>
</div>
</nav>
         <div class="container register_form mainpanel1">
             
             <div class="col-lg-12">
                 
                 <div class="col-md-12">
  <form  id ="register-form" class="well form-horizontal register_form" action="register_process.php" method="post" >
<fieldset>

<!-- Form Name -->
<legend class="form_header"><center><h3>Registration Form</h3></center></legend>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-6 control-label">Owner Name</label>  
  <div class="col-md-6">
  <div class="input-group">
  
  <input  name="Owner_name" placeholder="Owner Name" class="form-control input"  type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-6 control-label">E-Mail</label>  
    <div class="col-md-6">
    <div class="input-group">
  
  <input name="email" placeholder="E-Mail Address" class="form-control input"  type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-6 control-label" >Password</label> 
    <div class="col-md-6 ">
    <div class="input-group">
  
  <input name="user_password" placeholder="Password" class="form-control input"  type="password">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-6 control-label" >Confirm Password</label> 
    <div class="col-md-6 ">
    <div class="input-group">
  
  <input name="confirm_password" placeholder="Confirm Password" class="form-control input"  type="password">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-6 control-label">Restaurant / Hotel name</label>  
  <div class="col-md-6">
  <div class="input-group">
  
  <input  name="Restaurant_Name" placeholder="Restaurant / Hotel name" class="form-control input"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
    <label class="col-md-6 control-label" >Address from Google Map  </label> 
    <div class="col-md-3 ">
    <div class="input-group">                
        <textarea placeholder="Address from Google Map" name="Address" class="form-control input"></textarea>
        
    </div>
  </div>
    <div class="col-md-3 text-center">To add address , use <a href="https://google.com" target="_blank"><p style="font-size: 20px;">Google</p></a> maps, select 'Add a missing place' option from menu.</div>
</div>
 <div class="form-group">
    <label class="col-md-6 control-label" >Google Map location Latitude value</label> 
    <div class="col-md-6 ">
    <div class="input-group">        
       <input  name="Google_Latitude" placeholder="Latitude" class="form-control input"  type="text">
        
    </div>
  </div>
</div>
  <div class="form-group">
    <label class="col-md-6 control-label" >Google Map location Longitude value</label> 
    <div class="col-md-6 ">
    <div class="input-group">        
       <input  name="Google_Longitude" placeholder="Longitude" class="form-control input"  type="text">
        
    </div>
  </div>
</div>
 
<!-- Text input-->



<div class="form-group"> 
  <label class="col-md-6 control-label">Restaurant / Hotel type</label>
    <div class="col-md-6 selectContainer">
    <div class="input-group">
        
    <select   id = "restaurant_type" name="restaurant_type" class="form-control selectpicker" onChange="changetextbox();">
      <option value="">Please select Restaurant / Hotel type</option>
      <option value="Vegetarian">Vegetarian</option>
      <option value="Non Vegetarian">Non Vegetarian</option>      
      <option value="Veg and Non Veg">Veg and Non Veg</option>
      <option value="Sea Food">Sea Food</option>
      <option value="Home Made">Home Made</option>      
      <option value="Other">Other</option>
    </select>
  </div>
</div>
</div>

<div class="form-group" id="myDIV">
    
    <label style="display: none;" class="col-md-6 control-label" name="restaurant_type_other_label" id="restaurant_type_other_label">Enter Restaurant / Hotel type</label>  
    <div class="col-md-6 ">
    <div class="input-group">
        
        <input  style="display: none;" name="restaurant_type_other" id="restaurant_type_other" placeholder="Enter Restaurant / Hotel type" class="form-control input" type="text">
    </div>
  </div>
</div>


<!-- Text input-->



<!-- Text input-->
       


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-6 control-label">Country</label>  
    <div class="col-md-6 ">
    <div class="input-group">
        
  <input name="country" placeholder="Country" class="form-control input" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-6 control-label input">State</label>  
    <div class="col-md-6 ">
    <div class="input-group">
        
  <input name="state" placeholder="State" class="form-control input" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-6 control-label input">City</label>  
    <div class="col-md-6 ">
    <div class="input-group">
        
  <input name="city_name" placeholder="City" class="form-control input" type="text">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-6 control-label">Zip Code</label>  
    <div class="col-md-6 ">
    <div class="input-group">
        
  <input name="zipcode" placeholder="Zip Code" class="form-control input" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-6 control-label">Contact No.</label>  
    <div class="col-md-6 ">
    <div class="input-group">
        
  <input name="contact_no" placeholder="Contact Number" class="form-control input" type="text">
    </div>
  </div>
</div>

<!-- Select Basic -->


<!-- Button -->
<div class="form-group">
  <!--<label class="col-md-6 control-label"></label>
  <div class="col-md-12"></div> -->
  
  <div class="col-md-12 text-center"><br>
     <button type="submit" class="btn btn-primary" >SUBMIT</button>
  </div>
</div>

</fieldset>
</form>
                 </div>
</div>
         
    </div><!-- /.container -->   
    
    <?php
    
            include 'footer.php';
    
    ?>
    
    
    </body>
</html>
