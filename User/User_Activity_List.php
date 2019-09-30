<?php

//$tCityName=$_POST['tCityName'];

//$tCityName=$_GET['tCityName'];




$UserEmailValue=$_POST['UserEmail'];


$formattedUserDate=$_POST['formattedUserDate'];


$formattedUserDateRef2=date("Y-m-d", strtotime($formattedUserDate));

require_once('connection.php');   

//$query = "SELECT Order_Id,Order_Name,Order_Price,Order_Quantity,Total_Amount,Order_Reservation_Date,Order_Scheduled_Time,Restaurant_City,Restaurant_Name,Restaurant_State,Restaurant_Country,Restaurant_Address,Order_Image,Order_Type,Order_creation_Date, TIMEDIFF(Order_Reservation_Date,now()) as Schedule_Time from tbl_User_Order where User_Email_Id like '$UserEmailValue' order by Id desc";

//$query = "SELECT Order_Id,Order_Name,Order_Price,Order_Quantity,Total_Amount,Order_Reservation_Date,Order_Scheduled_Time,Restaurant_City,Restaurant_Name,Restaurant_State,Restaurant_Country,Restaurant_Address,Order_Image,Order_Type,Order_creation_Date, 
//CONCAT( TIMESTAMPDIFF(day, now(),Order_Reservation_Date) , ' days ', MOD( TIMESTAMPDIFF(hour,now(),Order_Reservation_Date), 24), ' hours ', MOD( TIMESTAMPDIFF(minute,now(),Order_Reservation_Date), 60), ' minutes ',
//MOD( TIMESTAMPDIFF(second,now(),Order_Reservation_Date), 60), ' seconds ') as Schedule_Time, ( UNIX_TIMESTAMP(Order_Reservation_Date)*1000) as Schedule_Mseconds from tbl_User_Order where User_Email_Id like '$UserEmailValue' order by Order_Reservation_Date asc";



$query = "SELECT Order_Id,Restaurant_Name,Restaurant_Address,Order_Reservation_Date,Order_Scheduled_Time,Order_creation_Date, 
( UNIX_TIMESTAMP(Order_Reservation_Date)*1000) as Schedule_Mseconds from 
tbl_user_order where User_Email_Id like '$UserEmailValue' and Order_Reservation_Date >='$formattedUserDateRef2' 
order by TIMESTAMP(Order_Reservation_Date,Order_Scheduled_Time) asc";



$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>