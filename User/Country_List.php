<?php


require_once('connection.php');   

$query = "SELECT distinct(Country) from  tbl_registered_points ORDER BY PId DESC";

//$query = "SELECT Point_Name,Food_Type,Longitude, Latitude from tbl_registered_points ORDER BY  DESC";

$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>