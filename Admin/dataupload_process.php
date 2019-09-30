<?php
include_once './Logging.php';
include_once './Db_Operations.php';
session_start();
$EmailIdValue= $_SESSION['username'];
//drequire_once('dbconfig.php');
$folderName = "uploads/";
$FileName=$_FILES["fileToUpload"]["name"];
if(strlen($FileName)==0)
{
$FileName2="defaultmenuitem.png";
$filepath = $folderName . $FileName2;
}
if(strlen($FileName)>0)
{
$extention = basename($FileName);
$extention2 = preg_replace('/\s+/', '_', $extention);
//echo $extention, $extention2;
//DIE;
$filename = rand(10000, 990000) . '_' . time() . '.' . $extention2;
// if user upload a file abc,jpg, it will convert it to 291905_1399918178.jpg based on random number and time.
$filepath = $folderName . $filename;
}
if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filepath))
{
// $msg="Failed to upload image!";
// header("Location:startapetition.php?msg=$msg");
}
$pimage=$filepath;
$PID_Value=$_POST['Pid_Value'];
$PID_Value=  intval($PID_Value);
$point_name=  filter_input(INPUT_POST, "point_name");

$point_address=  filter_input(INPUT_POST, "point_address");

$point_address=html_entity_decode($point_address);

$point_country=  filter_input(INPUT_POST, "point_country");
$point_state=  filter_input(INPUT_POST, "point_state");
$point_city=  filter_input(INPUT_POST, "point_city");
$Owner_name=  filter_input(INPUT_POST,"Owner_name");
$menu_item_name=  filter_input(INPUT_POST, "menu_item_name");
$menu_item_price=  filter_input(INPUT_POST, "menu_item_price");
$order_type=  filter_input(INPUT_POST, "order_type");
if(isset($_POST['menuitemcheck1']))
{
$menuitemcheck1=1;
}
else if(!isset($_POST['menuitemcheck1']))
{
$menuitemcheck1=0;
}
if(isset($_POST['menuitemcheck2']))
{
$menuitemcheck2=1;
}
else if(!isset($_POST['menuitemcheck2']))
{
$menuitemcheck2=0;
}
if(isset($_POST['menuitemcheck3']))
{
$menuitemcheck3=1;
}
else if(!isset($_POST['menuitemcheck3']))
{
$menuitemcheck3=0;
}
if(isset($_POST['menuitemcheck4']))
{
$menuitemcheck4=1;$menuitemcheck3=1;$menuitemcheck2=1;$menuitemcheck1=1;
}
else if(!isset($_POST['menuitemcheck4']))
{
$menuitemcheck4=0;
}
try
{
$log = new Logging();
$log->lfile('tmp/mylog.txt');
$CreateNewMenuItem = new Db_Operations();
$CreateNewMenuItem->createMenuItem($PID_Value,$point_name,$EmailIdValue,$point_address,$point_city,$point_state,$point_country,$menu_item_name,$order_type,$menuitemcheck1,$menuitemcheck2,$menuitemcheck3,$menuitemcheck4,$menu_item_price,$pimage);
header('Location:dataupload_success.php');
} catch (Exception $ex) {
$log->lwrite($ex->getMessage());
}