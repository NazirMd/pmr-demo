<?php

require_once('connection.php');   
	
$query = "SELECT Staff_Name, Staff_Designation,Staff_Mobile_Number,Staff_Login_Name,Mandal_Name,District_Name,Village_Ward_Name from staff_info";


$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
?>
