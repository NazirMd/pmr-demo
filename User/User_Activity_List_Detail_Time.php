<?php

//$tCityName=$_POST['tCityName'];

//$tCityName=$_GET['tCityName'];



$UserEmailValue=$_POST['UserEmail'];

$OrderIdReference=$_POST['orderId'];

$formattedUserDateReference=$_POST['formattedUserDate'];



require_once('connection.php');   


$query = "SELECT Order_Reservation_Date, Order_Scheduled_Time, CONCAT( TIMESTAMPDIFF(day, TIMESTAMP('$formattedUserDateReference'),TIMESTAMP(Order_Reservation_Date,Order_Scheduled_Time)) , ' days ', 
MOD( TIMESTAMPDIFF(hour,TIMESTAMP('$formattedUserDateReference'),TIMESTAMP(Order_Reservation_Date,Order_Scheduled_Time)), 24), ' : ', 
MOD( TIMESTAMPDIFF(minute,TIMESTAMP('$formattedUserDateReference'),TIMESTAMP(Order_Reservation_Date,Order_Scheduled_Time)), 60), ' : ',
MOD( TIMESTAMPDIFF(second,TIMESTAMP('$formattedUserDateReference'),TIMESTAMP(Order_Reservation_Date,Order_Scheduled_Time)), 60), ' ') 
as Schedule_Time, TIMESTAMPDIFF(second,now(),
TIMESTAMP(Order_Reservation_Date,Order_Scheduled_Time)) as TimeInSeconds 
from tbl_user_order where Order_Id like '$OrderIdReference'";


$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>