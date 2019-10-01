<?php

//use Db_Operations;

include_once 'Logging.php';

class Db_Operations {       
    
   //private static $_dbUser = 'mansurbaban';
   //private static $_dbPass = 'Khadarsil2018';   
   //private static $_dbDB = 'mansurba_customerdb';
   //private static $_dbHost = 'localhost';
  
   private static $_dbUser = 'xvi1krqqd2x3g1oo';
   private static $_dbPass = 'k5cv5z51owpxy27p';
   //private static $_dbDB = 'wantrefo_customerdb';
   private static $_dbDB = 'y0827d64hc2cp22e';
   private static $_dbHost = 'z37udk8g6jiaqcbx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
  
	
   
   private static $_connection = NULL;
    
    
    public function __construct() {       
        
    }

   public static function getConnection() {
            
      if (!self::$_connection) {
          
     self::$_connection = @new mysqli(self::$_dbHost, self::$_dbUser, self::$_dbPass, self::$_dbDB);

         if (self::$_connection -> connect_error) {
            die('Connect Error: ' . self::$_connection->connect_error);
         }
      }
      return self::$_connection;
   }

 
            public function createMenuItem($PID_Value,$point_name,$EmailIdValue,$point_address,$point_city,$point_state,$point_country,$menu_item_name,$order_type,$menuitemcheck1,$menuitemcheck2,$menuitemcheck3,$menuitemcheck4,$menu_item_price,$pimage)
 {
         try{
             
             $log = new Logging();
             
             $log->lfile('tmp/mylog.txt');
             
             /*
             $log->lwrite('Inside createMenuItem db function');
             
             $log->lwrite('PID Value');
             $log->lwrite($PID_Value);
             
             $log->lwrite('Point Name');
             $log->lwrite($point_name);
             
             $log->lwrite('Email Id Value');
             $log->lwrite($EmailIdValue);
             
             $log->lwrite('Point Address');
             $log->lwrite($point_address);
             
             $log->lwrite('Point City');
             $log->lwrite($point_city);
             
             
             $log->lwrite('Point State');
             $log->lwrite($point_state);
             
             $log->lwrite('Point Country');
             $log->lwrite($point_country);
             
             $log->lwrite('Menu Item Name');
             $log->lwrite($menu_item_name);
             
             $log->lwrite('Order type');
             $log->lwrite($order_type);
             
             $log->lwrite('Menu Item check 1');
             $log->lwrite($menuitemcheck1);
             
             $log->lwrite('Menu Item check 2');
             $log->lwrite($menuitemcheck2);
             
             $log->lwrite('Menu Item check 3');
             $log->lwrite($menuitemcheck3);
             
             $log->lwrite('Menu Item check 4');
             $log->lwrite($menuitemcheck4);
             
             $log->lwrite('Menu Item Price ');
             $log->lwrite($menu_item_price);
             
             $log->lwrite('Menu Item Image');
             $log->lwrite($pimage); */
             
			 
			 $conn=Db_Operations::getConnection();    
			 
             $query="insert into tbl_point_menu_details(Pid,Point_Name,P_Email_Id,Point_Address,Point_City,Point_State,Point_Country,Menu_Item,Menu_Order_type,
        BreakFast_check,Lunch_check,Dinner_check,Menu_Item_All_Check,Price,vImage,Creation_Date,BreakFastTime,Lunch_Time,Dinner_Time) 
        values($PID_Value,'$point_name','$EmailIdValue','$point_address','$point_city','$point_state','$point_country','$menu_item_name','$order_type',$menuitemcheck1,$menuitemcheck2,$menuitemcheck3,$menuitemcheck4,'$menu_item_price','$pimage',now(),'8 am to 11 am','1 pm to 3 pm','8 pm to 11 pm')";
		
             $log->lwrite('Inside createMenuItem db function 2');
			 
			 return mysqli_query($conn, $query);              
			 
         } catch (Exception $ex) {
             
             $log->lwrite($ex->getMessage());
         }
         
       //  mysqli_close($db);
         $log->lclose();
  
 }
    
 
 public function readMenuList($PIDValue)
 {   
    
     
    $conn=Db_Operations::getConnection();    
    $query="select MenuItem_Id,Point_Name,Price,vImage,Point_Address,Point_City,Point_State,Point_Country,Menu_Item,Menu_Order_type from tbl_point_menu_details where Pid=$PIDValue and status=1";
    return mysqli_query($conn, $query);              
     
     
 }
 
 public function readMenuListDescId($PIDValue)
 {
    $conn=Db_Operations::getConnection();
    $query="select MenuItem_Id,Point_Name,Price,vImage,Point_Address,Point_City,Point_State,Point_Country,Menu_Item,Menu_Order_type from tbl_point_menu_details where Pid=$PIDValue and status=1 order by MenuItem_Id desc";     
    return mysqli_query($conn, $query);   
 }


 public function readMenuListDescPrice($PIDValue)
 {
     $conn=Db_Operations::getConnection();
     $query="select MenuItem_Id,Point_Name,  Price ,vImage,Point_Address,Point_City,Point_State,Point_Country,Menu_Item,Menu_Order_type from tbl_point_menu_details where Pid=$PIDValue and status=1 order by Price DESC";    
     return mysqli_query($conn, $query);   
     
     
 }
 
 public function readMenuListAscPrice($PIDValue)
 {
       $conn=Db_Operations::getConnection();
       $query="select MenuItem_Id,Point_Name,Price,vImage,Point_Address,Point_City,Point_State,Point_Country,Menu_Item,Menu_Order_type from tbl_point_menu_details where Pid=$PIDValue and status=1 order by Price asc";
       return mysqli_query($conn, $query);   
 }
    
    public function readMenuListAscName($PIDValue)
    {
        $conn=Db_Operations::getConnection();
        $query="select MenuItem_Id,Point_Name,Price,vImage,Point_Address,Point_City,Point_State,Point_Country,Menu_Item,Menu_Order_type from tbl_point_menu_details where Pid=$PIDValue and status=1 order by Menu_Item asc";
        return mysqli_query($conn, $query);   
    }
    
    
    /*       Enable Menu Item List         */
    public function EnablereadMenuList($PIDValue)
 {   
     $conn=Db_Operations::getConnection();
     $query="select MenuItem_Id,Point_Name,Price,vImage,Point_Address,Point_City,Point_State,Point_Country,Menu_Item,Menu_Order_type from tbl_point_menu_details where Pid=$PIDValue and status=0";
     return mysqli_query($conn, $query);  
 }
 
 public function EnablereadMenuListDescId($PIDValue)
 {
     $conn=Db_Operations::getConnection();
    $query="select MenuItem_Id,Point_Name,Price,vImage,Point_Address,Point_City,Point_State,Point_Country,Menu_Item,Menu_Order_type from tbl_point_menu_details where Pid=$PIDValue and status=0 order by MenuItem_Id desc";     
   return mysqli_query($conn, $query);   
 }


 public function EnablereadMenuListDescPrice($PIDValue)
 {
   $conn=Db_Operations::getConnection();
   $query="select MenuItem_Id,Point_Name,  Price ,vImage,Point_Address,Point_City,Point_State,Point_Country,Menu_Item,Menu_Order_type from tbl_point_menu_details where Pid=$PIDValue and status=0 order by Price DESC";    
   return mysqli_query($conn, $query);     
 }
 
 public function EnablereadMenuListAscPrice($PIDValue)
 {
     
     $conn=Db_Operations::getConnection();
     $query="select MenuItem_Id,Point_Name,Price,vImage,Point_Address,Point_City,Point_State,Point_Country,Menu_Item,Menu_Order_type from tbl_point_menu_details where Pid=$PIDValue and status=0 order by Price asc";
     return mysqli_query($conn, $query);
 }
    
    public function EnablereadMenuListAscName($PIDValue)
    {
        $conn=Db_Operations::getConnection();
        $query="select MenuItem_Id,Point_Name,Price,vImage,Point_Address,Point_City,Point_State,Point_Country,Menu_Item,Menu_Order_type from tbl_point_menu_details where Pid=$PIDValue and status=0 order by Menu_Item asc";
        return mysqli_query($conn, $query);
    }
    
    
    
    /*------ Read Processed orders------*/
    
    
    
    
    
    public function GetProcessedOrders($PIDValue)
    {
        $conn=Db_Operations::getConnection();
        
        $query = "select Order_Id,   Order_Name,   Order_Price ,   Total_Amount,    "
        . "Order_Quantity,    Order_Type,   Order_Image,    Order_Reservation_Date ,   "
        . "Order_Scheduled_Time,   Restaurant_Name,   Restaurant_City ,  "
        . "Restaurant_State ,  Restaurant_Country ,  Restaurant_Address,Processed_Y_N , Allergy_Ingredient from tbl_User_Order "
        . "where Restaurant_Id=$PIDValue and Processed_Y_N=1" ;
        
        return mysqli_query($conn, $query);
        
    }
    
    public function ReadProcessedOrdersCreateDesc($PIDValue)
    {
        
        $conn=Db_Operations::getConnection();
        
        $query = "select Order_Id,   Order_Name,   Order_Price ,   Total_Amount,    "
        . "Order_Quantity,    Order_Type,   Order_Image,    Order_Reservation_Date ,   "
        . "Order_Scheduled_Time,   Restaurant_Name,   Restaurant_City ,  "
        . "Restaurant_State ,  Restaurant_Country ,  Restaurant_Address,Processed_Y_N , Allergy_Ingredient from tbl_User_Order "
        . "where Restaurant_Id=$PIDValue and Processed_Y_N=1 order by Id desc" ;
        
        return mysqli_query($conn, $query);
    }
    
    public function ReadProcessedOrderNameAsc($PIDValue)
    {
        $conn=Db_Operations::getConnection();
        
        $query = "select Order_Id,   Order_Name,   Order_Price ,   Total_Amount,    "
        . "Order_Quantity,    Order_Type,   Order_Image,    Order_Reservation_Date ,   "
        . "Order_Scheduled_Time,   Restaurant_Name,   Restaurant_City ,  "
        . "Restaurant_State ,  Restaurant_Country ,  Restaurant_Address,Processed_Y_N , Allergy_Ingredient from tbl_User_Order "
        . "where Restaurant_Id=$PIDValue and Processed_Y_N=1 order by Order_Name asc" ;
        
        return mysqli_query($conn, $query);
    }
    
    public function ReadProcessedOrdersPriceDesc($PIDValue)
    {
        $conn=Db_Operations::getConnection();
        
        $query = "select Order_Id,   Order_Name,   Order_Price ,   Total_Amount,    "
        . "Order_Quantity,    Order_Type,   Order_Image,    Order_Reservation_Date ,   "
        . "Order_Scheduled_Time,   Restaurant_Name,   Restaurant_City ,  "
        . "Restaurant_State ,  Restaurant_Country ,  Restaurant_Address,Processed_Y_N , Allergy_Ingredient from tbl_User_Order "
        . "where Restaurant_Id=$PIDValue and Processed_Y_N=1 order by Order_Price desc" ;
        
        return mysqli_query($conn, $query);
        
    }
    
    public function ReadProcessedOrdersPriceAsc($PIDValue)
    {
        $conn=Db_Operations::getConnection();
        
        $query = "select Order_Id,   Order_Name,   Order_Price ,   Total_Amount,    "
        . "Order_Quantity,    Order_Type,   Order_Image,    Order_Reservation_Date ,   "
        . "Order_Scheduled_Time,   Restaurant_Name,   Restaurant_City ,  "
        . "Restaurant_State ,  Restaurant_Country ,  Restaurant_Address,Processed_Y_N , Allergy_Ingredient from tbl_User_Order "
        . "where Restaurant_Id=$PIDValue and Processed_Y_N=1 order by Order_Price asc" ;
        
        return mysqli_query($conn, $query);
    }
    
    /**************
     * 
     * 
     */
    
    public function readPendingOrderListDesc($PIDValue)
 {   
     $conn=Db_Operations::getConnection();
     
     $query = "select Order_Id,   Order_Name,   Order_Price ,   Total_Amount,    "
        . "Order_Quantity,    Order_Type,   Order_Image,    Order_Reservation_Date ,   "
        . "Order_Scheduled_Time,   Restaurant_Name,   Restaurant_City ,  "
        . "Restaurant_State ,  Restaurant_Country ,  Restaurant_Address,Processed_Y_N , Allergy_Ingredient from tbl_User_Order "
        . "where Restaurant_Id=$PIDValue and Processed_Y_N=0 order by Id desc;" ;
     return mysqli_query($conn, $query);
     
 }
    
 public function readPendingOrderListOrderNameAsc($PIDValue)
 {   
     $conn=Db_Operations::getConnection();
     
     $query = "select Order_Id,   Order_Name,   Order_Price ,   Total_Amount,    "
        . "Order_Quantity,    Order_Type,   Order_Image,    Order_Reservation_Date ,   "
        . "Order_Scheduled_Time,   Restaurant_Name,   Restaurant_City ,  "
        . "Restaurant_State ,  Restaurant_Country ,  Restaurant_Address,Processed_Y_N , Allergy_Ingredient from tbl_User_Order "
        . "where Restaurant_Id=$PIDValue and Processed_Y_N=0 order by Order_Name asc;" ;
     return mysqli_query($conn, $query);
     
 }
 
 public function readPendingOrderListPriceDesc($PIDValue)
 {   
     $conn=Db_Operations::getConnection();
     
     $query = "select Order_Id,   Order_Name,   Order_Price ,   Total_Amount,    "
        . "Order_Quantity,    Order_Type,   Order_Image,    Order_Reservation_Date ,   "
        . "Order_Scheduled_Time,   Restaurant_Name,   Restaurant_City ,  "
        . "Restaurant_State ,  Restaurant_Country ,  Restaurant_Address,Processed_Y_N , Allergy_Ingredient from tbl_User_Order "
        . "where Restaurant_Id=$PIDValue and Processed_Y_N=0 order by Order_Price desc;" ;
     return mysqli_query($conn, $query);  
     
 }
 
 public function readPendingOrderListPriceAsc($PIDValue)
 {   
     $conn=Db_Operations::getConnection();
     
     $query = "select Order_Id,   Order_Name,   Order_Price ,   Total_Amount,    "
        . "Order_Quantity,    Order_Type,   Order_Image,    Order_Reservation_Date ,   "
        . "Order_Scheduled_Time,   Restaurant_Name,   Restaurant_City ,  "
        . "Restaurant_State ,  Restaurant_Country ,  Restaurant_Address,Processed_Y_N , Allergy_Ingredient from tbl_User_Order "
        . "where Restaurant_Id=$PIDValue and Processed_Y_N=0 order by Order_Price asc;" ;
     return mysqli_query($conn, $query);  
     
 }
 
    /********
     * 
     */
 
    /*------------ Read Pending orders-----------------*/
    
    
    public function GetPendingOrders($PIDValue)
    {
        
        $conn=Db_Operations::getConnection();
        
        $query = "select Order_Id,   Order_Name,   Order_Price ,   Total_Amount,    "
        . "Order_Quantity,    Order_Type,   Order_Image,    Order_Reservation_Date ,   "
        . "Order_Scheduled_Time,   Restaurant_Name,   Restaurant_City ,  "
        . "Restaurant_State ,  Restaurant_Country ,  Restaurant_Address,Processed_Y_N , Allergy_Ingredient from tbl_User_Order "
        . "where Restaurant_Id=$PIDValue and Processed_Y_N=0;" ;
        
        return mysqli_query($conn, $query);    
        
    }
    
    /****
     * 
     */
    
    
    
    
    
    /****
     * 
     */
    /*------------ Order Details-----------------*/
    
    
    public function GetOrderDetails($ID)
    {
        
        $conn=Db_Operations::getConnection();
        
       $query = "select Order_Id,   Order_Name,   Order_Price ,   Total_Amount,    "
        . "Order_Quantity,    Order_Type,   Order_Image,    Order_Reservation_Date ,   "
        . "Order_Scheduled_Time,   Restaurant_Name,   Restaurant_City ,  "
        . "Restaurant_State ,  Restaurant_Country ,  Restaurant_Address,Processed_Y_N , Allergy_Ingredient from tbl_User_Order where Order_Id='$ID' ";
       
        return mysqli_query($conn, $query);
    }
    
    
    
    
    /*----------------- Login----------*/
    
    
    public function LoginProcess($username,$pwd)
    {
        
        $conn=Db_Operations::getConnection();        
        $query =("SELECT * FROM tbl_registered_points WHERE email_id='{$username}' AND user_password='{$pwd}'");                
        return mysqli_query($conn, $query);        
        
        
        
    }
    
    
    /*------Check Dataupload Point details-------------*/
    
    public function LoadPointDetails($emailvalue)
    {
        $conn=Db_Operations::getConnection();        
        $query = "SELECT PId,Point_Name,Point_Address,City,Country,State_Name from  tbl_registered_points where email_id='$emailvalue'";
        return mysqli_query($conn, $query);
    }
    
    
    /*------------ Searchorder Id--------------*/
    public function  SearchOrderId($PIDValue,$term)
            
    {
        $conn=Db_Operations::getConnection();
        $query = "SELECT * FROM tbl_user_order WHERE Restaurant_Id = $PIDValue and  Order_Id LIKE '" . $term . "%'";
        return mysqli_query($conn, $query);
        
    }
    
    
    
    /*-------------Menu Item Data----------------*/
    
    public function EditMenuItemData($EmailIdValue)
    {
        $conn=Db_Operations::getConnection();
        $query = "SELECT PId,Point_Name,Point_Address,City,Country,State_Name from  tbl_registered_points where email_id like '$EmailIdValue'";
        return mysqli_query($conn, $query);  
    }
    
    
    public function EditMenuItemDataByNumber($MenuItemNumber)
    {
        $conn=Db_Operations::getConnection();
        $query = "SELECT Menu_Item,Price,vImage,Menu_Order_type from tbl_point_menu_details where MenuItem_Id=$MenuItemNumber";
        return mysqli_query($conn, $query);  
    }
    
    
    public function EditMenuItemProcess($menu_item_name,$order_type,$menuitemcheck1,$menuitemcheck2,$menuitemcheck3,$menuitemcheck4,$menu_item_price
            ,$pimage,$MenuItemNumberUpdate)
    {
        
        $conn=Db_Operations::getConnection();
        
         $query = "update                 
        tbl_point_menu_details
        set Menu_Item='$menu_item_name',Menu_Order_type='$order_type',
        BreakFast_check=$menuitemcheck1,Lunch_check=$menuitemcheck2,Dinner_check=$menuitemcheck3,Menu_Item_All_Check=$menuitemcheck4,
        Price='$menu_item_price',vImage='$pimage',
        Modified_date= now() where MenuItem_Id=$MenuItemNumberUpdate";       
        return mysqli_query($conn, $query);  
        
    }
    
    
    public function EditMenuItemProcess2($menu_item_name,$order_type,$menuitemcheck1,$menuitemcheck2,$menuitemcheck3,$menuitemcheck4,$menu_item_price
            ,$MenuItemNumberUpdate)
    {
        
        $conn=Db_Operations::getConnection();
        
         $query = "update                 
        tbl_point_menu_details
        set Menu_Item='$menu_item_name',Menu_Order_type='$order_type',
        BreakFast_check=$menuitemcheck1,Lunch_check=$menuitemcheck2,Dinner_check=$menuitemcheck3,Menu_Item_All_Check=$menuitemcheck4,
        Price='$menu_item_price',
        Modified_date= now() where MenuItem_Id=$MenuItemNumberUpdate";
        
         return mysqli_query($conn, $query);  
        
        
    }
    
    
    /*---------------------------*/
    
    
    /*-------------Disable Menu Item and Enable Menu Item--------------*/
    
    public function DisableMenuItem($MenuItemNumberUpdate)            
    {
        
          $conn=Db_Operations::getConnection();
          
         $query = "update                 
        tbl_point_menu_details
        set status=0,
        Modified_date= now() where MenuItem_Id=$MenuItemNumberUpdate";
         
        return mysqli_query($conn, $query);  
        
        
    }
    
    public function EnableMenuItem($MenuItemNumberUpdate)            
    {
         $conn=Db_Operations::getConnection();
         
         $query = "update                 
        tbl_point_menu_details
        set status=1,
        Modified_date= now() where MenuItem_Id=$MenuItemNumberUpdate";
         
        return mysqli_query($conn, $query);  
        
    }

    /*---------------------------*/
    
    
    
    /*-------- Update Admin profile---------------*/
    
    
    public function UpdateAdminProfile($EmailIdValue)
            
    {
        $conn=Db_Operations::getConnection();
        $query = "select PId, Owner_name, email_id, user_password, confirm_password, Point_Name, Food_Type,Point_Address, City, CityCode, Longitude, Latitude, Country, State_Name, zipcode,Contact_No from tbl_registered_points where email_id='$EmailIdValue'";
        return mysqli_query($conn, $query);
        
        
    }
    
    public function UpdateAdminProfileProcess($Owner_name,$email,$user_password,$confirm_password,$Restaurant_Name,$Address,$restaurant_type,$city_name,$Google_Longitude,$Google_Latitude,$country,$state,$contact_no,$zipcode,$P_ID)
            
    {
        $conn=Db_Operations::getConnection();
        $query = "update tbl_registered_points set Owner_name='$Owner_name',email_id='$email',user_password='$user_password',confirm_password='$confirm_password',Point_Name='$Restaurant_Name',Point_Address='$Address',Food_Type='$restaurant_type',City='$city_name',Longitude='$Google_Longitude',Latitude='$Google_Latitude',Country='$country',State_Name='$state',Contact_No='$contact_no',zipcode='$zipcode' where PId='{$P_ID}'";
         return mysqli_query($conn, $query);
        
    }
    
    
    /*-------- Update Admin profile---------------*/
    
    
    
    
    
    
    /*--------- Process order---------------*/
    
    
    public function ProcessOrder($OrderIdValue)
    {
        $conn=Db_Operations::getConnection();
        $query="update tbl_user_order set Processed_Y_N =1 where Order_Id='$OrderIdValue'";
        return mysqli_query($conn, $query);
        
    }






    /*--------- Process order---------------*/
    
    
/*---------- register admin-------------*/    
    
    public function RegisterAdminProfile($Owner_Name,$email,$user_password,$confirm_password,$Restaurant_Name,$Address,$restaurant_type,$cityname,$Google_Longitude,$Google_Latitude,$country,$state,$contact_no,$zipcode,$district_name)
    {

        $conn=Db_Operations::getConnection();
        
        $query="insert into tbl_registered_points(Owner_name,email_id,
     user_password,confirm_password,Point_Name,Point_Address,Food_Type,
     City,Longitude,Latitude,Country,State_Name,Contact_No,zipcode,District_County_Name) values
('$Owner_Name','$email','$user_password','$confirm_password','$Restaurant_Name','$Address','$restaurant_type','$cityname','$Google_Longitude','$Google_Latitude','$country','$state','$contact_no','$zipcode','$district_name')";
        
        return mysqli_query($conn, $query);
        
    }
    
    
/*---------- register admin-------------*/        
    
 }
 

