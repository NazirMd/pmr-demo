<?php

 require_once('connection.php'); 


if(isset($_POST['txtUserEmail']))
{

     $userEmail=$_POST['txtUserEmail'];	 
    
    $query = "SELECT Id,User_name,User_Email_id,User_Password FROM tbl_User_register_food where User_Email_id='{$userEmail}'";
    $result=  mysqli_query($conn,$query);
	
    if(mysqli_num_rows($result) == 0)
    { 
        echo "EmailPassFailure";
		
    }
    else 
    {
		echo "success";
		
	    /*while($row= mysqli_fetch_assoc($result))
            {
				
           // $UserId=$row["UserId"];
            $uname=$row["User_name"];
            $pwd=$row["User_Password"];
            $useremailid=$row["User_Email_id"];
            $subject="Forgot Password";
            $message="<html>
            <head></head>
            <body>
            <div style=\"background-color: #EEEEEE; text-align: left; margin: 0px auto; width: 720px;\">
            <div style=\"padding:0px; background-color: white; margin: 5px auto; width: 640px;\"> 
            <div style=\"background-color:#B2C629; padding: 8px 5px 8px 10px;\">
            <a href=\"https://www.wantreform.org\" style=\"font-family: Arial Rounded MT; color: white; text-decoration:none; 
            font-size: 25px;\">wantreform.org</a>
            </div>
            <div style=\"padding: 20px;\">
            <p>Hello $uname,</p>
            <p>You can find your <a href=\"https://www.wantreform.org\" style=\"text-decoration:none; color: black;\">wantreform.org</a> user account details here: </p>
            <p>Your User name is:</p><p style=\" color: darkred;\">$uname</p>
            <p>Your Password is:</p><p style=\" color: darkred;\">$pwd</p>  
            <p>You can login into your account by using this Username and Password.</p>       
            <p>To login clik here: 
            <a href=\"https://www.wantreform.org/login\" style=\"text-decoration:none\">Login</a>
            </p>
            <p>Let us know if there is anything we can do to help!</p>
            <p>Good luck,<br />
            The <a href=\"https://www.wantreform.org\" style=\"text-decoration:none; color: black;\">wantreform.org</a> team
            </p>
            </p>
            </div> 
            <div style=\"background-color:#B2C629;\"><br></div>
            </div>
            </div>
            </body>
            </html>";
             include_once('clsSMTPEmail.php');
             $Toaddress=$useremailid;
             $clsEmail = new clsSMTPEmail(); // created a object of clsSMTPEmail class
             $return_Msg = $clsEmail->SendSMTPEmail($message,$Toaddress,$subject); // calling SendSMTPEmail function. 
             //echo $uname,$pwd,$message;
             if($return_Msg =="Message sent")
             {
                  //$query3="insert into petitioner_email_tbl(UserId,Petitioner_Password,dt_CreatedDate,dt_ModifiedDate) values ('{$UserId}','1',now(),now()) ";
               //   $query3="CALL InsertOrUpdatePetitionerPassword_sp($UserId); ";
                 // $result3=mysqli_query($con,$query3);
				 
				  
	          if($result3){		  
				  
			  }
		  else { throw new Exception("Could not connect!"); }
	     }
              
         }*/
		
		 
    }
	
}	
 mysqli_close($conn);
?>