<?php


$tPId=$_POST['tPId'];

$tPIdInt= intval($tPId);

//$tPId=1;

require_once('connection.php');   

$query = "SELECT distinct(Point_Name) , Dinner_Time from tbl_point_menu_details where Pid =$tPIdInt";


$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>