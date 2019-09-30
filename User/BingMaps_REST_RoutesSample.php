<?php

if(isset($_POST['origin']) && isset($_POST['destination']))
{
	
	
	
  // Set default map width and height
  //$mapWidth = 300;
  //$mapHeight = 300;
  
    // URL of Bing Maps REST Routes API; 
		
	
  $baseURL = "https://dev.virtualearth.net/REST/v1/Routes";

  // Set key based on user input
  $key = "AqbZjc-FAw9cxgJ0hJS8zo6Td80GyCZe9bx8n1RijiPwGt_-2qYRkXYNGuo3g62R";

  // construct parameter variables for Routes call
  $wayPoint0 = str_ireplace(" ","%20",$_POST['origin']);
  $wayPoint1 = str_ireplace(" ","%20",$_POST['destination']);
  $optimize = "minimizeTolls";
  $routePathOutput = "Points";
  $distanceUnit = "km";
  $travelMode = "Driving";
  
  
  // Construct final URL for call to Routes API
 // $routesURL = $baseURL."/".$travelMode."?wp.0=".$wayPoint0."&wp.1=".$wayPoint1."&avoid=".$optimize."&output=xml&key=".$key;
 
 $routesURL = $baseURL."/".$travelMode."?wp.0=".$wayPoint0."&wp.1=".$wayPoint1."&avoid=".$optimize."&output=xml&key=".$key;
  
  // Get output from API and convert to XML element using php_xml
  
  $output = file_get_contents($routesURL);  
  
 
  
  $response = new SimpleXMLElement($output);
 
  
  // Extract and print number of routes from response
  $numRoutes = $response->ResourceSets->ResourceSet->EstimatedTotal;
 // echo "Number of routes found: ".$numRoutes."<br>";

  // Extract and print route instructions from response
  $itinerary = $response->ResourceSets->ResourceSet->Resources->Route->RouteLeg->ItineraryItem;

  
  for ($i = 0; $i < count($itinerary); $i++) {
    $instruction = $itinerary[$i]->Instruction;
// While looping, construct the $maneuverPoints array for later use (note casting to double)


$maneuverPoints[$i]->Latitude = (double) $itinerary[$i]->ManeuverPoint->Latitude;
$maneuverPoints2[$i]->Longitude = (double) $itinerary[$i]->ManeuverPoint->Longitude;




echo $maneuverPoints[$i]->Latitude."pmr".$maneuverPoints2[$i]->Longitude.",";

//echo json_encode($maneuverPoints[$i]->Latitude.",".$maneuverPoints2[$i]->Longitude);

//echo "<li>".$instruction."</li>";
  }
  
  
  //}


		
  
  //echo "</ol>";

}
else
{
  echo "<p>Please enter your Bing Maps key and complete all address fields, then click submit.</p>";
}
?>
