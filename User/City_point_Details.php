<?php

//$tCityName=$_POST['tCityName'];

//$tCityName=$_GET['tCityName'];


$PointId=$_POST['PointId'];

$PointIdIntValue=intval($PointId);

//$FoodType=$_POST['FoodType'];

//$DidstrictNames=$_POST['WayPointDistrictsArray'];

//$LatLangCheck=$_POST['LatLangCheck'];

require_once('connection.php');   

		$query = "SELECT Point_Name,PId,Point_Address,Longitude,Latitude,City,State_Name,image_name from tbl_registered_points where PId = $PointIdIntValue";
	
$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>