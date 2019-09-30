<?php

//$tCityName=$_POST['tCityName'];

//$tCityName=$_GET['tCityName'];


$PointId=$_POST['PointId'];

$PointIdIntValue=intval($PointId);

//$FoodType=$_POST['FoodType'];

//$DidstrictNames=$_POST['WayPointDistrictsArray'];

//$LatLangCheck=$_POST['LatLangCheck'];

require_once('connection.php');   

		$query = "SELECT Image_Path from tbl_point_details where PId = $PointIdIntValue";
	
$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>