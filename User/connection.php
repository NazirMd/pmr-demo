<?php


$servername="localhost";
$username="mansurbaban";
$password="Khadarsil2018";
//$dbname="mansurba_wantreformdb";
$dbname="mansurba_customerdb";

$conn=  mysqli_connect($servername, $username, $password, $dbname);

if(!$conn)
{
    die("Connection failed".  mysqli_connect_error());
}
?>

