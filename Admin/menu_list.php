<?php
session_start();
$EmailIdValue= $_SESSION['username'];
$PIDValue= $_SESSION['PID'];
$rownumber=1;
include_once './Logging.php';
include_once './Db_Operations.php';
$menulist = new Db_Operations();
$result = $menulist->readMenuList($PIDValue);
if(isset($_POST['sortdesc']))
{
$result = $menulist->readMenuListDescId($PIDValue);
}
if(isset($_POST['sortpricedesc'])) {
$result = $menulist->readMenuListDescPrice($PIDValue);
}
if(isset($_POST['sortpriceasc'])) {
$result = $menulist->readMenuListAscPrice($PIDValue);
}
if(isset($_POST['sortmenuitemname'])) {
$result = $menulist->readMenuListAscName($PIDValue);
}
//$result=  mysqli_query($conn, $query);
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
<script src="js/bootbox.min.js" type="text/javascript"></script>
<script src="js/disbalemodal.js" type="text/javascript"></script>
</head>
<body>
<?php
include './header_post_login.php'
?>
<div class="container mainpanel1">
<div class="row">
<div class="col-lg-12">
<legend class="form_header" style="padding-top: 5px; padding-bottom:  10px;">
<center><h3>Menu List</h3></center></legend>
</div>
</div>
    
    <?php        
                
        $num_rows = mysqli_num_rows($result);             
        if($num_rows==0)
        {
        ?>
        <div class="row">
        <div class="col-md-12 text-center">
        <h3>There are no menu items available</h3>
        </div>
        </div>
        <?php   
        }
        else if($num_rows>0)
        {         
        ?>
    
    
<div class="row" style="margin-bottom: 20px;">
<div class="col-lg-12">
<form action="menu_list.php" method="post">
<button class="btn btn-primary" name="sortdesc">Sort by Creation Order: Descending </button>
<button class="btn btn-primary" name="sortmenuitemname">Sort by Menu Item Name</button>
<button class="btn btn-primary" name="sortpricedesc">Sort By Price: Higher - Lower</button>
<button class="btn btn-primary" name="sortpriceasc">Sort By Price: Lower - Higher</button>
</form>
</div>
</div>
<div class="bs-example">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>Sr. No</th>
<th>Menu Item</th>
<th>Image</th>
<th>Price</th>
<th>Point Name</th>
<th>Point Address</th>
<th>Point City</th>
<th>Point State</th>
<th>Point Country</th>
<th>Menu_Order_type</th>
<th>Edit</th>
<th>Disable</th>
</tr>
</thead>
<tbody>
<?php
while($row  = mysqli_fetch_assoc($result))
{
?>
<tr >
<td><?php echo $rownumber ++;?></td>
<td><?php echo $row['Menu_Item']?></td>
<td class="thumbnail" style="width: 100px; height: 100px;"> <?php echo "<img src='" . $row['vImage']."' >" ?></td>
<td><?php echo $row['Price']?></td>
<td><?php echo $row['Point_Name']?></td>
<td><?php echo $row['Point_Address']?></td>
<td><?php echo $row['Point_City']?></td>
<td><?php echo $row['Point_State']?></td>
<td><?php echo $row['Point_Country']?></td>
<td><?php echo $row['Menu_Order_type']?></td>
<td>
<form action="edit_menu_item.php" method="POST">
<button class="btn btn-primary" >Edit</button>
<input type="hidden" value="<?php echo $row['MenuItem_Id'];?>" name="MenuItem_Id" id="MenuItem_Id">
</form>
</td>
<td>
<a class="disbale_menu btn btn-danger" data-menu-id="<?php echo $row['MenuItem_Id']; ?>" href="javascript:void(0)">
Disable
</a>
</td>
</tr>
<?php
        }}
// mysqli_close($conn);
//}
?>
</tbody>
</table>
</div>
</div>
<?php
include("footer.php");
?>
</body>
</html>