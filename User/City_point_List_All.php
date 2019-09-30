<?php

//$tCityName=$_POST['tCityName'];

//$tCityName=$_GET['tCityName'];


$Country=$_POST['Country'];

$FoodType=$_POST['FoodType'];

$DidstrictNames=$_POST['WayPointDistrictsArray'];

$LatLangCheck=$_POST['LatLangCheck'];

require_once('connection.php');   

if($LatLangCheck=='LatDesc')
{
	if($FoodType=='All')
	{
		$query = "SELECT Point_Name,PId,Point_Address,Longitude,Latitude,City,State_Name,image_name from tbl_registered_points where Country = '$Country' and City in($DidstrictNames) order by Latitude Desc";
	}
	
	else {
	$query = "SELECT Point_Name,PId,Point_Address,Longitude,Latitude,City,State_Name,image_name from tbl_registered_points where Country = '$Country' and City in($DidstrictNames) and Food_Type like '%$FoodType%' order by Latitude Desc";
	}
}

else if($LatLangCheck=='LatAsc')	
{
	
			if($FoodType=='All')
			{
				
$query = "SELECT Point_Name,PId,Point_Address,Longitude,Latitude,City,State_Name,image_name from tbl_registered_points where Country = '$Country' and City in($DidstrictNames) order by Latitude Asc";

			}
			
			else 
			{
				$query = "SELECT Point_Name,PId,Point_Address,Longitude,Latitude,City,State_Name,image_name from tbl_registered_points where Country = '$Country' and City in($DidstrictNames) and Food_Type like '%$FoodType%' order by Latitude Asc";
			}
}
$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>