<?php

//require_once('dbconfig2.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['username']) ){
   header("Location:Index.php");
}

if(!isset($_REQUEST['menuid']))
{
    header("Location:Index.php");
}

if(isset($_REQUEST['menuid'])) {
$MenuItemNumberUpdate=$_REQUEST['menuid'];

try{
    
include_once './Logging.php';
include_once './Db_Operations.php';

$EnableMenuItem = new Db_Operations();

$resultset = $EnableMenuItem->EnableMenuItem($MenuItemNumberUpdate);
    
        if($resultset) {
		echo "Record Disabled";
	}
        
} catch (Exception $ex) {

    echo $ex;
}
}
// mysqli_close($conn);

    
    
 
 


