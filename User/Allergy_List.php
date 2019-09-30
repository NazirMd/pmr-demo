<?php


require_once('connection.php');   

$query = "SELECT DISTINCT trim(Item_Name) as Allergy_Item_Name from tbl_Allergy_List";



$result=  mysqli_query($conn, $query);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>