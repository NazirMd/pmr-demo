<?php

 require_once('connection.php');   

if(isset($_POST['txtUserEmail']) && isset($_POST['txtPassword']))
{
        $userEmail=$_POST['txtUserEmail'];
		$userpassword=$_POST['txtPassword'];
        
        
        $query = "select * from tbl_User_register_food where User_Email_id='$userEmail' and User_Password = '$userpassword'";
        
        $result=  mysqli_query($conn, $query);
        
        
        if($result->num_rows > 0)
        {
            echo 'success';
			exit;
        }   
        
        else if($result->num_rows == 0)
		{
            echo 'namePassFailure';
            exit;       
		}               
        
}

 mysqli_close($conn);
?>
