<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$emailvalue=$_SESSION['username'];


include_once './Logging.php';
include_once './Db_Operations.php';

$CheckPointDetails = new Db_Operations();

$result = $CheckPointDetails->LoadPointDetails($emailvalue);  

//$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
$PId=$row['PId'];
$Point_Name=$row['Point_Name'];
$Point_Address=$row['Point_Address'];
$City=$row['City'];
$Country=$row['Country'];
$State_Name=$row['State_Name'];
}
//mysqli_close($conn);
include "upload-image.php";
if(isset($_FILES['file']['name']))
{
$filename=$_FILES['file']['name'];
echo $filename;
}
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
<script src="js/data-upload-check.js"></script>

<script>
            
                function chekitem()
                {
                if(!(document.getElementById("menuitemcheck1").checked)  && !(document.getElementById("menuitemcheck2").checked) && !(document.getElementById("menuitemcheck3").checked) && !(document.getElementById("menuitemcheck4").checked))
                {
                document.getElementById("itemcheck").innerHTML = "Please select at least one menu item";
                document.getElementById("itemcheck").style.display='block';
                return false;
                }
                 else
                 {
                     return true;
                 }
                }
              
    
</script>

<script>
if($('#menuitemcheck1').not(':checked')){
$("#itemcheck").show(); 

}
</script>
 <script type="text/javascript">    
         
     
    $(function () {       
        
                
        $("#menuitemcheck1").click(function () {
            if ($(this).is(":checked")) {
                $("#itemcheck").hide(); 
            
        }
                
        });
                        
        $("#menuitemcheck2").click(function () {
            if ($(this).is(":checked")) {
                $("#itemcheck").hide();
            }
          
        });
        
        
        $("#menuitemcheck3").click(function () {
            if ($(this).is(":checked")) {
                $("#itemcheck").hide();
            } 
        });
        
        $("#menuitemcheck4").click(function () {
            if ($(this).is(":checked")) {
                $("#itemcheck").hide();
            } 
        });
    });
</script>


</head>
<body>
<?php
include './header_post_login.php'
?>
<div class="container register_form mainpanel1">
<div class="row">
<div class="col-lg-12">
<legend class="form_header" style="padding-top: 5px; padding-bottom:  10px;">
<center><h3>Create new Menu Item</h3></center></legend>
</div></div>
<div class="row">
<div class="col-lg-12">
<form class="well form-horizontal register_form" action="dataupload_process.php" method="post" enctype="multipart/form-data" id="contact_form">
<div class="col-md-6">
<div class="form-group">
<label class="col-md-6 control-label">Menu item name</label>
<div class="col-md-6">
<div class="input-group">
<input  name="menu_item_name" placeholder="Menu item name" class="form-control input"  type="text">
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-6 control-label">Menu item price</label>
<div class="col-md-6">
<div class="input-group">
<input  name="menu_item_price" placeholder="Menu item price" class="form-control input"  type="text">
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-6 control-label">Order type availability</label>
<div class="col-md-6 selectContainer">
<div class="input-group">
<select name="order_type" class="form-control selectpicker">
<option value="">Please select Order type</option>
<option value="Take Away">Take Away</option>
<option value="Dine In">Dine In</option>
<option value="All">All</option>
</select>
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-6 control-label">Menu item type</label>
<div class="col-md-6 selectContainer">
<div class="input-group">
<div class="checkbox">
    <label><input type="checkbox" value="Breakfast" name="menuitemcheck1" id="menuitemcheck1" >Breakfast</label>
</div>
<div class="checkbox">
<label><input type="checkbox" value="Lunch" name="menuitemcheck2" id="menuitemcheck2" >Lunch</label>
</div>
<div class="checkbox">
<label><input type="checkbox" value="Dinner" name="menuitemcheck3" id="menuitemcheck3" >Dinner</label>
</div>
<div class="checkbox">
<label><input type="checkbox" value="All" name="menuitemcheck4" id="menuitemcheck4" >All</label>
</div>
    
    <div id="itemcheck" style="display: hide; font-weight:600;">Please select at least one menu item</div>    
</div>
</div>

</div>
    
<div class="form-group">
<label class="col-md-6 control-label ">Upload Image</label>
<div class="col-md-6">
<div class="input-group">
<script>
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e)
{
$('#blah').show();
$('#cancel').show();
$('#blah').attr('src', e.target.result).width(250).height(150);
$('#filesToUpload').val('REPLACE PHOTO');
};
reader.readAsDataURL(input.files[0]);
}
}
</script>
<!-- ########### End of display chooses image before upload ############### -->
<!--<img id="cancel" src="uploads/cancel.png" alt="cancel" width="30px;" height="30px" class="thumbnail" style="display: none"  />-->
<img id="blah" src="#" alt="upload image"  class="img-responsive img-rounded" style="display: none; width: 304px; height: 236px;" />
<!-- ##################### Cancel button for image ########################### -->
<script type="text/javascript">
$(document).ready(function()
{
$("#cancel").on("click",function()
{
var input = $('#imageToUpload');
input.wrap('<form>').closest('form').get(0).reset();
input.unwrap();
$("#blah").hide();
$("#cancel").hide();
$('#filesToUpload').val('UPLOAD PHOTO');
});
});
</script>
<script>
$(document).ready( function() {
$('#filesToUpload').click(function(){
$("#imageToUpload").click();
});
});
</script>
<!-- ############# End of display upload button instead of choose file control ################# -->
<input type="file" name="fileToUpload"  id="imageToUpload" accept="image/*" onchange="readURL(this);" style="display: none;"><br>
<input type="button" value="UPLOAD PHOTO" name="" id="filesToUpload"  class="btn btn-primary ">
<br><br>
<input type="button" value="CANCEL PHOTO" name="" id="cancel"  class="btn btn-primary" style="display: none">
</div>
</div></div> </div>
<div class="col-md-6">
<div class="form-group">
<label class="col-md-6 control-label">Restaurant Name</label>
<div class="col-md-6">
<div class="input-group">
<input  name="point_name"  class="form-control input"  type="text" value="<?php echo $Point_Name ?>" readonly="true">
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-6 control-label">Restaurant Address</label>
<div class="col-md-6">
<div class="input-group">
<input  name="point_address"  class="form-control input"  type="text" value="<?php echo $Point_Address ?>" readonly="true">
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-6 control-label">India</label>
<div class="col-md-6">
<div class="input-group">
<input  name="point_country"  class="form-control input"  type="text" value="<?php echo $Country ?>" readonly="true">
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-6 control-label">State</label>
<div class="col-md-6">
<div class="input-group">
<input  name="point_state"  class="form-control input"  type="text" value="<?php echo $State_Name ?>" readonly="true">
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-6 control-label">City</label>
<div class="col-md-6">
<div class="input-group">
<input  name="point_city"  class="form-control input"  type="text" value="<?php echo $City ?>" readonly="true">
</div>
</div>
</div>
<input type="hidden" value="<?php echo $PId; ?>" name="Pid_Value" id="Pid_Value">
</div>
<div class="form-group">
<div class="col-md-12 text-center"><br>
    <input type="submit" class="btn btn-primary" onclick="return chekitem();"value="SUBMIT" />
</div>
</div>
</form>
</div>
</div>
</div>
<?php
include("footer.php");
?>
</body>
</html>