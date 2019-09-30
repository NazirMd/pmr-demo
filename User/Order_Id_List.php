<?php

require_once('connection.php');   


$sql = "SELECT Order_Id FROM tbl_user_order order by Id desc limit 1";

$result=  mysqli_query($conn, $sql);

while($row  = mysqli_fetch_assoc($result)){
    
    $data[]=$row;
}

    echo json_encode($data); 

 mysqli_close($conn);
 
 

//}
?>