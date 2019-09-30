<?php
$conn = mysqli_connect("localhost","root","root");
if (!$conn)
  {
  die('Could not connect: ' . mysqli_error());
  }
  
mysqli_select_db($conn, "customer");

?>
