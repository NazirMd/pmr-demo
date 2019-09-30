<?php

$OrderIdValue=$_POST['orderId'];
try
{
    
include_once './Logging.php';
include_once './Db_Operations.php';

$orderprocess = new Db_Operations();

$result = $orderprocess->ProcessOrder($OrderIdValue);

header('Location:order_detail_process_success.php');
 
} catch (Exception $ex) {
    
    echo $ex;

}
 