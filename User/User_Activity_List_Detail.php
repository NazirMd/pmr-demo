<?php

//$tCityName=$_POST['tCityName'];

//$tCityName=$_GET['tCityName'];



$UserEmailValue=$_POST['UserEmail'];

$OrderIdReference=$_POST['orderId'];

$orderIdDateValueRef = $_POST['orderIdDateValue'];

$orderIdDateValueRef2=date("Y-m-d", strtotime($orderIdDateValueRef));


require_once('connection.php');   

//$query = "SELECT Order_Id,Order_Name,Order_Price,Order_Quantity,Total_Amount,Order_Reservation_Date,Order_Scheduled_Time,Restaurant_City,Restaurant_Name,Restaurant_State,Restaurant_Country,Restaurant_Address,Order_Image,Order_Type,Order_creation_Date, TIMEDIFF(Order_Reservation_Date,now()) as Schedule_Time from tbl_User_Order where User_Email_Id like '$UserEmailValue' order by Id desc";

$query = "SELECT Order_Id,Order_Name,Order_Price,Order_Quantity,Total_Amount,Order_Reservation_Date,Order_Scheduled_Time,Restaurant_Id,Restaurant_City,Restaurant_Name,Restaurant_State,Restaurant_Country,Restaurant_Address,Order_Image,Order_Type,Order_creation_Date,CONCAT( TIMESTAMPDIFF(day, now(),TIMESTAMP(Order_Reservation_Date,Order_Scheduled_Time)) , ' days ', 
MOD( TIMESTAMPDIFF(hour,now(),TIMESTAMP(Order_Reservation_Date,Order_Scheduled_Time)), 24), ' hours ', 
MOD( TIMESTAMPDIFF(minute,now(),TIMESTAMP(Order_Reservation_Date,Order_Scheduled_Time)), 60), ' minutes ',
MOD( TIMESTAMPDIFF(second,now(),TIMESTAMP(Order_Reservation_Date,Order_Scheduled_Time)), 60), ' seconds ') 
as Schedule_Time , ( UNIX_TIMESTAMP(Order_Reservation_Date)*1000) as Schedule_Mseconds ,Allergy_Ingredient from tbl_user_order where User_Email_Id like '$UserEmailValue' and Order_Id like '$OrderIdReference' and Order_Reservation_Date like '$orderIdDateValueRef2' order by Id desc";


$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>