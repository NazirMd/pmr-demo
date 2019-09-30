<?php

$Country=$_POST['Country'];

//$State=$_POST['State'];

$DidstrictNames=$_POST['WayPointDistrictsArray'];

$SelectedFoodType=$_POST['FoodTypeSelected'];



require_once('connection.php');   

//$query = "SELECT distinct(City) , CityCode, State_Name from tbl_registered_points where Country like '$Country' and State_Name like '$State' ORDER BY PId ASC";


if($SelectedFoodType=='All')
{
$query = "SELECT distinct(City) , State_Name from tbl_registered_points where Country like '$Country' and CITY in ($DidstrictNames) order by Latitude desc";
}
else
{
$query = "SELECT distinct(City) , State_Name from tbl_registered_points where Country like '$Country' and CITY in ($DidstrictNames) and Food_Type like '%$SelectedFoodType%' order by Latitude desc";
}

$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>