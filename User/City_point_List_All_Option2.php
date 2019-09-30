<?php

//$tCityName=$_POST['tCityName'];

//$tCityName=$_GET['tCityName'];


$Country=$_POST['Country'];

$FoodType=$_POST['FoodType'];

$DestinationPointtext=$_POST['DestinationPoint'];

require_once('connection.php'); 


if($FoodType=='All')  
{

$query = "SELECT Point_Name,PId,Point_Address,Longitude,Latitude,City,State_Name,image_name from tbl_registered_points where Country = '$Country' and City like '$DestinationPointtext'";
}

else
	
	{

	$query = "SELECT Point_Name,PId,Point_Address,Longitude,Latitude,City,State_Name,image_name from tbl_registered_points where Country = '$Country' and City like '$DestinationPointtext' and Food_Type='$FoodType' ";
	
	}

$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>