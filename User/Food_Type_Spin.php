<?php



//$tCountryName=$_GET['tCountryName'];

$tCountryName=$_POST['tCountryName'];
//$tStateName=$_POST['tStateName'];

require_once('connection.php');   

//$query = "SELECT distinct(Food_Type) from tbl_registered_points where Country like '$tCountryName' and State_Name like '$tStateName' ORDER BY PId DESC";

$query = "SELECT distinct(Food_Type) from tbl_registered_points where Country like '$tCountryName'  ORDER BY Food_Type Asc";



$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>