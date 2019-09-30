<?php
ob_start();
session_start();
$message="";
if( isset($_POST['admin_user_name'])
&&isset($_POST['admin_user_pwd'])
)
{
    
$username=filter_input(INPUT_POST,"admin_user_name");
$pwd=filter_input(INPUT_POST,"admin_user_pwd");

echo $username;
echo $pwd;

if(isset($_POST['frlogin']))
{
    
    if(strlen(trim($username))==0 ||strlen(trim($pwd))==0)
    {
        $error = "Please enter user name and password.";
        header("Location: Index.php?msg=$error");
    }
    else {
        
include_once 'Logging.php';
include_once 'Db_Operations.php';

$usercheck = new Db_Operations();


$result = $usercheck->LoginProcess($username,$pwd);       


 while($row  = mysqli_fetch_assoc($result))
 {
     $_SESSION['PID'] = $row['PId'];    
     
 } 
 
 if(mysqli_num_rows($result)==1)
     
//if(mysqli_num_rows($result)==1)
{    
    $_SESSION['username'] = $username;
    $_SESSION['pwd'] = $pwd;
    
header("Location: admin_operations.php");
}
else
{
    
$error = "Please enter valid user name and password.";
header("Location: Index.php?msg=$error");
}
    }


}

//mysqli_close($conn);
}

?>