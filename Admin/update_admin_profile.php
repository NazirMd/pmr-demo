<?php

session_start();
$EmailIdValue= $_SESSION['username'];

//include("dbconfig2.php");

include_once './Logging.php';
include_once './Db_Operations.php';

$UpdateAdminProfile = new Db_Operations();

$result = $UpdateAdminProfile->UpdateAdminProfile($EmailIdValue);

while($row  = mysqli_fetch_assoc($result)){
    
    $P_Id=$row['PId'];
    
    $Owner_name=$row['Owner_name'];   
    
    $email_id=$row['email_id'];
    
    $user_password=$row['user_password'];
    
    $confirm_password=$row['confirm_password'];
    
    $Point_Name=$row['Point_Name'];
    
    $Point_Address=$row['Point_Address'];
    
    
    $City=$row['City'];
    
    $Longitude=$row['Longitude'];
    
    $Latitude=$row['Latitude'];
    
    
    $Country=$row['Country'];
    
    $State_Name=$row['State_Name'];
    
    $Contact_No=$row['Contact_No'];
    
    $Food_Type=$row['Food_Type'];
    
    $CityCode=$row['CityCode'];
    
    $zipcode=$row['zipcode'];
    
}
//mysqli_close($conn);


?>



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
<script src="js/update_admin_profile.js" type="text/javascript"></script>


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
        <?php
    include './header_post_login.php'
    ?> 
         <div class="container mainpanel1">
             
             <br>
             <div class="col-lg-12">
                 
                 <div class="col-md-12 text-center">
<form class="well form-horizontal register_form" action="update_admin_profile_process.php" method="post"  id="update_admin_profile_form">
<fieldset>

<!-- Form Name -->
<legend class="form_header"><center><h3>Edit Admin profile</h3></center></legend>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-6 control-label">Owner Name</label>  
  <div class="col-md-6">
  <div class="input-group">
  
      <input  name="Owner_name" placeholder="Owner Name" class="form-control input"  type="text" value="<?php echo $Owner_name?>">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-6 control-label">E-Mail</label>  
    <div class="col-md-6">
    <div class="input-group">
  
        <input name="email" placeholder="E-Mail Address" class="form-control input"  type="text" value="<?php echo $email_id?>">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-6 control-label" >Password</label> 
    <div class="col-md-6 ">
    <div class="input-group">
  
  <input name="user_password" placeholder="Password" class="form-control input"  type="password" value="<?php echo $user_password?>">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-6 control-label" >Confirm Password</label> 
    <div class="col-md-6 ">
    <div class="input-group">
  
  <input name="confirm_password" placeholder="Confirm Password" class="form-control input"  type="password" value="<?php echo $confirm_password?>">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-6 control-label">Restaurant / Hotel name</label>  
  <div class="col-md-6">
  <div class="input-group">
  
  <input  name="Restaurant_Name" placeholder="Restaurant / Hotel name" class="form-control input"  type="text" value="<?php echo $Point_Name?>">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
    <label class="col-md-6 control-label" >Address from Google Map</label> 
    <div class="col-md-3">
    <div class="input-group">
        <textarea placeholder="Address from Google Map" name="Address" class="form-control input"><?php echo htmlspecialchars($Point_Address);?></textarea>
     
     <!-- <input placeholder="Address from Google Map" name="Address" class="form-control input"  value="<?php echo $Point_Address?>" >-->
        
    </div>
  </div>
    
    <div class="col-md-3 text-center">To add address , use <a href="https://google.com" target="_blank"><p style="font-size: 20px;">Google</p></a> maps, select 'Add a missing place' option from menu.</div>
</div>

    <div class="form-group">
    <label class="col-md-6 control-label" >Google Map location Longitude value</label> 
    <div class="col-md-6 ">
    <div class="input-group">        
       <input  name="Google_Longitude" placeholder="Longitude" class="form-control input"  type="text" value="<?php echo $Longitude?>">
        
    </div>
  </div>
</div>
  <div class="form-group">
    <label class="col-md-6 control-label" >Google Map location Latitude value</label> 
    <div class="col-md-6 ">
    <div class="input-group">        
       <input  name="Google_Latitude" placeholder="Latitude" class="form-control input"  type="text" value="<?php echo $Latitude?>">
        
    </div>
  </div>
</div>
  
<!-- Text input-->



<div class="form-group"> 
  <label class="col-md-6 control-label">Restaurant / Hotel type</label>
    <div class="col-md-6 selectContainer">
    <div class="input-group">        
    <select name="restaurant_type" id="restaurant_type" class="form-control selectpicker" onChange="changetextbox();">
      <option value="">Please select Restaurant / Hotel type</option>
      <option value="Vegetarian">Vegetarian</option>
      <option value="Non Vegetarian">Non Vegetarian</option>      
      <option value="Veg and Non Veg">Veg and Non Veg</option>
      <option value="Sea Food">Sea Food</option>
      <option value="Home Made">Home Made</option>      
      <option value="Other">Other</option>
    </select>  
        
  </div>
        
      <div class="col-md-6" style="margin-top: 5px;">
      <?php echo 'Provide Restaurant / Hotel type ' ?>:  <?php echo $Food_Type;?>
        
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
        
  <input name="country" placeholder="Country" class="form-control input" type="text" value="<?php echo $Country?>">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-6 control-label input">State</label>  
    <div class="col-md-6 ">
    <div class="input-group">
        
  <input name="state" placeholder="State" class="form-control input" type="text" value="<?php echo $State_Name?>">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-6 control-label input">City</label>  
    <div class="col-md-6 ">
    <div class="input-group">
        
  <input name="city_name" placeholder="City" class="form-control input" type="text" value="<?php echo $City?>">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-6 control-label">Zip Code</label>  
    <div class="col-md-6 ">
    <div class="input-group">
        
  <input name="zipcode" placeholder="Zip Code" class="form-control input" type="text"  value="<?php echo $zipcode?>">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-6 control-label">Contact No.</label>  
    <div class="col-md-6 ">
    <div class="input-group">
        
  <input name="contact_no" placeholder="Contact Number" class="form-control input" type="text" value="<?php echo $Contact_No?>">
    </div>
  </div>
</div>

<!-- Select Basic -->


<!-- Button -->
<div class="form-group">
  <!--<label class="col-md-4 control-label"></label>
  <div class="col-md-12"></div> -->
  
  <div class="col-md-12 text-center"><br>
     <button type="submit" class="btn btn-primary" >UPDATE</button>
  </div>
</div>

</fieldset>
                         
                         <input type="hidden" value="<?php echo $P_Id?>" name="P_Id">
</form>
                 </div>
</div>
         
    </div><!-- /.container -->   
      <?php
  
  include 'footer.php';
  ?>
    </body>
</html>
