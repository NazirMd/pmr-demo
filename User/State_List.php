<?php


//$tCountryName=$_GET['tCountryName'];

$tCountryName=$_POST['tCountryName'];

require_once('connection.php');   

$query = "SELECT distinct(State_Name) from tbl_registered_points where Country like '$tCountryName' ORDER BY PId DESC";



$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>