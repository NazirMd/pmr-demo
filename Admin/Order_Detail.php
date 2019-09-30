<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
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
<style type="text/css">
body{
font-family: Arail, sans-serif;
}
/* Formatting search box */
.search-box{
width: 145px;
position: relative;
display: inline-block;
font-size: 14px;
}
.search-box input[type="text"]{
height: 32px;
padding: 5px 10px;
border: 1px solid #CCCCCC;
font-size: 14px;
}
.result{
position: absolute;
z-index: 999;
top: 100%;
left: 0;
}
.search-box input[type="text"], .result{
width: 100%;
box-sizing: border-box;
}
/* Formatting result items */
.result p{
margin: 0;
padding: 7px 10px;
border: 1px solid #CCCCCC;
border-top: none;
cursor: pointer;
background-color: #55acee;
}
.result p:hover{
background: #f2f2f2;
}
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('.search-box input[type="text"]').on("keyup input", function(){
/* Get input value on change */
var inputVal = $(this).val();
var resultDropdown = $(this).siblings(".result");
if(inputVal.length){
$.get("backend-search.php", {term: inputVal}).done(function(data){
// Display the returned data in browser
resultDropdown.html(data);
});
} else{
resultDropdown.empty();
}
});
// Set search input value on click of result item
$(document).on("click", ".result p", function(){
$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
$(this).parent(".result").empty();
});
});
</script>
<style type="text/css">
.bs-example{
//margin: 20px;
}
</style>
</head>
<body>
<?php
include './header_post_login.php'
?>
<div class="container mainpanel1">
<div class="container ">
<div class="row"><div class="col-lg-12">
<legend class="form_header" style="padding-top: 5px; padding-bottom:  10px;">
<center><h3>Order Details</h3></center></legend>
</div></div>
<form method="post" >
<div class="container register_form">
<div class="panel panel-default">
<div class="panel-body ">
<div class="row">
<div class="col-lg-12">
<div class="col-md-4">
<div class="search-box">
<input type="text" autocomplete="off" placeholder="Enter Order Id"  id="searchstring" name="searchstring"/>
<div class="result"></div>
</div>
</div>
<div class="col-md-4">
<button class="btn btn-primary">Search</button>
</div>
<div class="col-md-4"></div>
</div>
</div>
</div>
</div>
</div>
</form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$ID = isset($_POST['searchstring']) ? $_POST['searchstring'] : false;
if(isset($_POST['searchstring']) && strlen($ID)==0)
{
?>
<div class="container">
<div class="row">
<div class="col-lg-12 text-center text-danger">
<h4>Please provide Order id</h4>
</div>
</div>
</div>
<?Php }
else if(strlen($ID)>0){
//include ("dbconfig.php");
include_once './Logging.php';
include_once './Db_Operations.php';
$menulist = new Db_Operations();
$result = $menulist->GetOrderDetails($ID);
//$result=  mysqli_query($conn, $query);
        
$num_rows = mysqli_num_rows($result);   
 
if($num_rows==0)
        {
        ?>
        <div class="row">
        <div class="col-md-12 text-center text-danger">
        <h4>Please verify the Order id</h4>
        </div>
        </div>
        <?php   
        }

else if($num_rows>0)
        {         
        
?>
<div class="container">
    <div class="text-center" style="color: #000000; font-size: 18px; margin: 10px; " >Note: ' Allergy Prone Ingredients [Exclusion list] ' should be compulsory excluded while preparing the dish.</div>     
<table class="table table-striped table-bordered text-center">
<thead class="text-center">
<tr>
<th>Order Id</th>
<th>Order Name</th>
<th style="background-color: #F00000; color: #ffffff;">Allergy Prone Ingredients [Exclusion list]</th>
<th>Image</th>
<th>Order Price</th>
<th>Total Amount</th>
<th>Order Quantity</th>
<th>Order Reservation_Date</th>
<th>Order Scheduled_Time</th>
<th>Restaurant_Name</th>
<th>Processed_Y_N</th>
</tr>
</thead>
<tbody>
    
<?php
 
while($row  = mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $row['Order_Id']?></td>
<td><?php echo $row['Order_Name']?></td>
<td><?php echo $row['Allergy_Ingredient']?></td>
<td class="thumbnail img-rounded" style="width: 100px; height: 75px;"> <?php echo "<img src='" . $row['Order_Image']."' >" ?></td>
<td><?php echo $row['Order_Price']?></td>
<td><?php echo $row['Total_Amount']?></td>
<td><?php echo $row['Order_Quantity']?></td>
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
</tbody></table>
    
<div class="col-lg-12 text-center">
<?php
if($row['Processed_Y_N']==0)
{
?>
<form action="order_detail_process.php" method="post">
<button class="btn btn-primary">Process</button>
<input type="hidden" value="<?php echo $row['Order_Id']?>" name="orderId" id="orderId">
</form>
<?php
}
?>
</div>
<?php
}
//mysqli_close($conn);
?>
</div>
<?php
}
else {
    
}
}
}
?>
</div>

</body>
<?php
include 'footer.php';
?>
</html>