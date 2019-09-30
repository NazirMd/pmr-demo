<?php

//$tCityName=$_POST['tCityName'];

//$tCityName=$_GET['tCityName'];



$UserEmailValue=$_POST['UserEmail'];

$RestId=$_POST['RestId'];

$RestIdInt = intval($RestId);


$formattedUserDate=$_POST['formattedUserDate'];


$formattedUserDateRef2=date("Y-m-d", strtotime($formattedUserDate));


require_once('connection.php');   

$query = "SELECT Order_Id,Order_Name,Order_Price,Order_Quantity,Total_Amount,
Order_Reservation_Date,Order_Scheduled_Time, Restaurant_Id,Restaurant_City,Restaurant_Name,Restaurant_State,
Restaurant_Country,Restaurant_Address,Order_Image,Order_Type,Allergy_Ingredient 
from tbl_user_order where User_Email_Id like '$UserEmailValue' and Restaurant_Id = $RestIdInt and Order_Reservation_Date >= '$formattedUserDateRef2' 
order by TIMESTAMP(Order_Reservation_Date,Order_Scheduled_Time) asc
";

//$query = "SELECT distinct(Restaurant_Id),Restaurant_Name, Restaurant_Address from tbl_user_order where User_Email_Id like '$UserEmailValue' and ";

$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>