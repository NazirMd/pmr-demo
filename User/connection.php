<?php


//$servername="localhost";
//$username="mansurbaban";
//$password="Khadarsil2018";
//$dbname="mansurba_customerdb";

$servername="z37udk8g6jiaqcbx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username="xvi1krqqd2x3g1oo";
$password="k5cv5z51owpxy27p";
$dbname="y0827d64hc2cp22e";
 
$conn=  mysqli_connect($servername, $username, $password, $dbname);

if(!$conn)
{
    die("Connection failed".  mysqli_connect_error());
}
?>

