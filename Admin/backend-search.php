<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$PIDValue= $_SESSION['PID'];



// Escape user inputs for security
//$term = mysqli_real_escape_string($conn, $_REQUEST['term']);

//$term = mysqli_real_escape_string($_REQUEST['term']);

$term = $_REQUEST['term'];



 
if(isset($term)){
    
    // Attempt select query execution
    
    
include_once './Logging.php';
include_once './Db_Operations.php';

$OrderIdcheck = new Db_Operations();

$result = $OrderIdcheck->SearchOrderId($PIDValue,$term);
    
        
        if(mysqli_num_rows($result) > 0){
            
            while($row = mysqli_fetch_array($result)){
                echo "<p>" . $row['Order_Id'] . "</p>";
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found</p>";
        }
     //else{
       // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    //}
}
 
// close connection
//mysqli_close($conn);
