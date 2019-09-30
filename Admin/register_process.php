<?php


//$Owner_Name=$_POST['Owner_name'];

$Owner_Name=  filter_input(INPUT_POST, "Owner_name");

//$email=$_POST['email'];

$email=  filter_input(INPUT_POST, "email");

//$user_password=$_POST['user_password'];

$user_password=  filter_input(INPUT_POST, "user_password");

//$confirm_password=$_POST['confirm_password'];

$confirm_password=  filter_input(INPUT_POST, "confirm_password");

//$Restaurant_Name=$_POST['Restaurant_Name'];

$Restaurant_Name=  filter_input(INPUT_POST,"Restaurant_Name");

//$Address=$_POST['Address'];

$Address=  filter_input(INPUT_POST, "Address");


//$Google_Longitude=$_POST['Google_Longitude'];

$Google_Longitude=  filter_input(INPUT_POST, "Google_Longitude");


//$Google_Latitude=$_POST['Google_Latitude'];

$Google_Latitude=  filter_input(INPUT_POST, "Google_Latitude");

//$restaurant_type=$_POST['restaurant_type'];

$restaurant_type=  filter_input(INPUT_POST, "restaurant_type");

$Restaurant_type_Other=filter_input(INPUT_POST,"restaurant_type_other");

if($restaurant_type=="Other")
{
$restaurant_type=$Restaurant_type_Other;    
}


$country=  filter_input(INPUT_POST, "country");

//$state=$_POST['state'];

$state=  filter_input(INPUT_POST, "state");

$district_name=  filter_input(INPUT_POST, "district_name");

//$zipcode=$_POST['zipcode'];

$zipcode=  filter_input(INPUT_POST, "zipcode");


//$cityname=$_POST['city_name'];


$cityname=  filter_input(INPUT_POST, "city_name");
        
//$contact_no=$_POST['contact_no'];        

$contact_no=  filter_input(INPUT_POST, "contact_no");

/*
 * 
 * echo "Owner Name --->".$Owner_Name;

echo "Owner email --->".$email;

echo "user password --->".$user_password;

echo "confirm user password --->".$confirm_password;

echo "Restaurant name --->".$Restaurant_Name;

echo "address --->".$Address;

echo "Google Longitude --->".$Google_Longitude;

echo "Google Latitude--->".$Google_Latitude;

echo "restaurant type--->".$restaurant_type;

echo "Country--->".$country;

echo "State--->".$state;

echo "zipcode--->".$zipcode;

echo "contact_no--->".$contact_no; 
*/
try
{
include_once 'Logging.php';
include_once 'Db_Operations.php';

$registeradmin = new Db_Operations();

$result = $registeradmin->RegisterAdminProfile($Owner_Name, $email, $user_password, $confirm_password, $Restaurant_Name, $Address, $restaurant_type, $cityname, $Google_Longitude, $Google_Latitude, $country, $state, $contact_no, $zipcode,$district_name);
     
header('Location:register_success.php');
 
} catch (Exception $ex) {
    
    echo $ex;

}
 
  
 
