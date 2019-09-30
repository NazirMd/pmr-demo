<?php


$tMenuItemPid=$_POST['tMenuItem_Id'];

$tMenuItemPidInt= intval($tMenuItemPid);

//$tPId=1;

require_once('connection.php');   

$query = "SELECT Menu_Item,Price,vImage,Pid,Point_Name,Point_Address,Point_City,Point_State,Point_Country from tbl_point_menu_details where MenuItem_Id =$tMenuItemPidInt ";


$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>