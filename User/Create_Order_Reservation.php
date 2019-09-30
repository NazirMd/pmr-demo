<?php

require_once('connection.php'); 
           
				 
 $Reservation_Date=$_POST['Reservation_Date'];
 
 $Reservation_Date2 = DateTime::createFromFormat('d-m-Y', $Reservation_Date);
 
 $Reservation_Date3=$Reservation_Date2->format('Y-m-d');

 $Reservation_Time=$_POST['Reservation_Time'];
 
 $User_Email=$_POST['User_Email'];
 
 $Menu_Item=$_POST['Menu_Item'];
 
 $Point_Name=$_POST['Point_Name']; 
 
 
 
 $Item_Price=$_POST['Item_Price']; 
 $Point_City=$_POST['Point_City'];
 
 $Point_Address=$_POST['Point_Address']; 
 $Point_State=$_POST['Point_State'];
 
 $Point_Country=$_POST['Point_Country']; 
 
 $Point_Id=$_POST['Point_Id']; 
 
 $Point_Id_int=intval($Point_Id);
 
 $Menu_Item_Image=$_POST['Menu_Item_Image'];
 
 $Order_Quantity=$_POST['Order_Quantity'];
 
 $TotalAmount=$Item_Price*$Order_Quantity;
 
 $OrderId=$_POST['OrderId'];
 
 $Order_Quantity_int=intval($Order_Quantity);
 
 $Order_Type_Text=$_POST['Order_Type'];
 
 
 $Ing_List=$_POST['Ing_List']; 
 
 if($Ing_List=='AllergyListIsEmpty')
	 $Ing_List='Allergy prone item list is empty';
 
 
 
 //$query_Sequence="select ORDID from ORD";
 
// $Seq_result=  mysqli_query($conn, $query_Sequence);

	//while($row  = mysqli_fetch_assoc($Seq_result)){
    
    //$data[]=$row;
//}

//$OrderId=strval($data)+"_"+$OrderId;
            
 //$query_order = "insert into //tbl_user_order(Order_Name,Order_Price,Order_Image,Order_Reservation_Date,Order_Scheduled_Time,Restaurant_Name,Restaurant_City,Restaurant_State,Restaurant_Country,Restaurant_Address//s,Restaurant_Id)  //values('$Menu_Item','$Item_Price','$Menu_Item_Image','$Reservation_Date','$Reservation_Time','$Point_Name','$Point_City','$Point_State','$Point_Country','$Point_Address',$Point_Id//_int)"; 
 
 $query_order = "insert into tbl_user_order(Order_Name,Order_Price,Restaurant_Name,Restaurant_City,Order_Reservation_Date,Order_Scheduled_Time,Restaurant_Address,	Restaurant_State,Restaurant_Country,Order_Image,Restaurant_Id,User_Email_Id,Order_Quantity,Total_Amount,Order_Type,Allergy_Ingredient) 
 values('$Menu_Item','$Item_Price','$Point_Name',' $Point_City','$Reservation_Date3','$Reservation_Time','$Point_Address','$Point_State','$Point_Country','$Menu_Item_Image',$Point_Id_int,'$User_Email',$Order_Quantity_int,'$TotalAmount','$Order_Type_Text','$Ing_List')";
 
 $result=  mysqli_query($conn, $query_order);
 
 //mysqli_close($conn);
  


$sql = "SELECT Id FROM tbl_user_order order by Id desc limit 1";

if ($result2=mysqli_query($conn,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result2))
    {
		$OrderIdVal=$row[0];
   
    }
  
  mysqli_free_result($result2);
}


 	$OrderId2=strval($OrderIdVal)."".$OrderId;
	
	$Query_update_order="update tbl_user_order set Order_Id='$OrderId2' where id=$OrderIdVal";
	
	 $Updateresult=  mysqli_query($conn, $Query_update_order);
			
			if($result > 0)
				
				{					
                                    echo "RecordInsertedSuccessfully";
                                    exit;
				}
				
				else {				
					
					echo "Something Error";
					exit;
				}

     




  mysqli_close($conn);
  

  
  
  
?>








