<?php

require_once('connection.php');   
	
$query = "SELECT Point_Name,PId,Point_Address,Longitude,Latitude,City,State_Name,image_name from tbl_registered_points";


$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
?>
