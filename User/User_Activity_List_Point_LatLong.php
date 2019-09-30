<?php

//$tCityName=$_POST['tCityName'];

$RestaurantId=$_GET['RestaurantId'];


$RestaurantIdInt=intval($RestaurantId);

require_once('connection.php');   


$query = "SELECT Latitude,Longitude from tbl_registered_points where PId=$RestaurantIdInt";


$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>