<?php

 $Owner_name=  filter_input(INPUT_POST,"Owner_name");   
    
 $email=  filter_input(INPUT_POST,"email");   
 
 $user_password=  filter_input(INPUT_POST,"user_password");   
 
 $confirm_password=  filter_input(INPUT_POST,"confirm_password");   
 
 $Restaurant_Name=  filter_input(INPUT_POST,"Restaurant_Name");   
 
 $Address=  filter_input(INPUT_POST,"Address");   
 
 $Google_Longitude=  filter_input(INPUT_POST,"Google_Longitude"); 
 
 $Google_Latitude=filter_input(INPUT_POST,"Google_Latitude");
 
 $restaurant_type=  filter_input(INPUT_POST,"restaurant_type");   
 
 
 $Restaurant_type_Other=filter_input(INPUT_POST,"restaurant_type_other");

if($restaurant_type=="Other")
{
$restaurant_type=$Restaurant_type_Other;    
}
 
 
 $country=  filter_input(INPUT_POST,"country");   
 
 $state=  filter_input(INPUT_POST,"state");   
 
 $city_name=  filter_input(INPUT_POST,"city_name");
 
 $zipcode=  filter_input(INPUT_POST,"zipcode");   
 $contact_no=  filter_input(INPUT_POST,"contact_no");   
 
 $P_ID=  filter_input(INPUT_POST,"P_Id");   

 
    
try
{
include_once './Logging.php';
include_once './Db_Operations.php';

$UpdateAdminProfileProcess = new Db_Operations();

$result = $UpdateAdminProfileProcess->UpdateAdminProfileProcess($Owner_name, $email, $user_password, $confirm_password, $Restaurant_Name, $Address, $restaurant_type, $city_name, $Google_Longitude, $Google_Latitude, $country, $state, $contact_no, $zipcode, $P_ID);
 
header('Location:update_admin_profile_success.php');
 
} catch (Exception $ex) {
    
    echo $ex;

}
 
//mysqli_close($conn);