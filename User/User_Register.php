<?php  

        require_once('connection.php');  
			
			 

	    $textusername=	$_POST['txt_user_name'];              
		$textemail=$_POST['txt_user_email'];
		$textuserpassword=$_POST['txt_user_pwd'];
		
		
		
       // if($pwd!=$confirmpassword)
        //{
          //  echo "PasswordMismatch";
		//	exit;            
        //} 
		
        $query="SELECT User_Email_id FROM tbl_User_register_food where User_Email_id like '$textemail'";
			
        $result=  mysqli_query($conn,$query);
			
        if(mysqli_num_rows($result) != 0)
            { 
            echo "UserAlreadyRegistered";
            exit;
            }
			
			else if(mysqli_num_rows($result) == 0) 
				
				{       
         		
				$query_register="insert into tbl_User_register_food(User_name, User_Email_id, User_Password,Creation_Date,Modified_Date) VALUES (
				'$textusername','$textemail','$textuserpassword',now(),now())";
				
				$result2=  mysqli_query($conn, $query_register);
     
            if($result2)
            {	    
            echo "RecordInsertedSuccessfully";
			exit;			            
            }	
	    else 
            {
           echo "RegistrationFailed";
		   exit;
            } 
				}
    // close connection 
    mysqli_close($conn);        
    
    
    ?>