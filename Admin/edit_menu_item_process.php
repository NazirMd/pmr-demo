<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$EmailIdValue= $_SESSION['username'];
$MenuItemNumberUpdate = $_POST['MenuItemNumber'];
$OldImage=$_POST['vImageName'];

$folderName = "uploads/";

$FileName=$_FILES["fileToUpload"]["name"];



if(strlen($FileName)==0)
{
   // $FileName2=$OldImage;
    $filepath = $OldImage;
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
 
 //$PID_Value=  filter_input_array(INPUT_POST,"Pid_Value");
 
 $PID_Value=  intval($PID_Value);
 
 //echo $PID_Value;
 
 //$point_name=$_POST['point_name']; 
 
 $point_name=  filter_input(INPUT_POST, "point_name");
 
 //echo $point_name;
 //$point_address=$_POST['point_address'];
 
 $point_address=  filter_input(INPUT_POST, "point_address");
 
 //$point_country=$_POST['point_country']; 
 
 $point_country=  filter_input(INPUT_POST, "point_country");
 
 //$point_state=$_POST['point_state']; 
 
 $point_state=  filter_input(INPUT_POST, "point_state");
 
// $point_city=$_POST['point_city'];
  
 $point_city=  filter_input(INPUT_POST, "point_city");

 
//$menu_item_name=$_POST['menu_item_name'];
 
 $Owner_name=  filter_input(INPUT_POST,"Owner_name");   

$menu_item_name=  filter_input(INPUT_POST, "menu_item_name");


//$menu_item_price=$_POST['menu_item_price'];

$menu_item_price=  filter_input(INPUT_POST, "menu_item_price");

//$order_type=$_POST['order_type'];

$order_type=  filter_input(INPUT_POST, "order_type");

if($order_type=="Select Order type")
{
    $order_type=$Menu_Order_type;
}


//$menu_item_type=$_POST['menu_item_type'];


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
    
    include_once './Logging.php';
    include_once './Db_Operations.php';

$MenuItemProcess = new Db_Operations();
    

    
    if(strlen($pimage)>0)
    {
     $MenuItemProcess->EditMenuItemProcess($menu_item_name, $order_type, $menuitemcheck1, $menuitemcheck2, $menuitemcheck3, $menuitemcheck4, $menu_item_price, $pimage, $MenuItemNumberUpdate);
     header('Location:edit_menu_item_success.php');
    }
    else if(strlen($pimage)==0)
    {
     $MenuItemProcess->EditMenuItemProcess2($menu_item_name, $order_type, $menuitemcheck1, $menuitemcheck2, $menuitemcheck3, $menuitemcheck4, $menu_item_price, $MenuItemNumberUpdate);
     header('Location:edit_menu_item_success.php');
    }
 
 //mysqli_query($conn,$insertQuery);
 
// echo 'Record inserted';
 

 
} catch (Exception $ex) {
    
    echo $ex;

}
 
  
 
//  mysqli_close($conn);