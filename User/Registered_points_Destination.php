<?php

//$tSource=$_GET["tSource"];
//$tDestination=$_GET["tDestination"];

//$tFoodType=$_GET['tFoodType'];

$Country=$_POST['Country'];

//$State=$_POST['State'];

$FoodType=$_POST['FoodType'];

$destinationtext=$_POST['DestinationPoint'];


require_once('connection.php');   

if($FoodType=='All')
{

//$query = "SELECT Point_Name,Food_Type,Longitude, Latitude,City from tbl_registered_points where Country like '$Country' and State_Name like '$State' ORDER //BY Id DESC";

$query = "SELECT Point_Name,Food_Type,Longitude, Latitude,City from tbl_registered_points where Country like '$Country' and City like '$destinationtext'";
}
else 
{	
//$query = "SELECT Point_Name,Food_Type,Longitude, Latitude,City from tbl_registered_points where Country like '$Country' and State_Name like '$State' and //Food_Type like '$FoodType' ORDER BY Id DESC";


$query = "SELECT Point_Name,Food_Type,Longitude, Latitude,City from tbl_registered_points where Country like '$Country' and City like '$destinationtext' and Food_Type like '$FoodType' ";
}

$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>