<?php 
//  Connect to the database
$con = mysqli_connect('localhost','ch','123456a','sunnyspot');

// Select cabinType, cabinDescription, pricePerNight, pricerPerWeek ,photo from the database
$sql = 'select cabinId,cabinType, cabinDescription,pricePerNight,pricePerWeek,photo from cabin';

if(mysqli_connect_errno()) {
  $msg = "Database connection failed: ";
  $msg .= mysqli_connect_error();
  $msg .= " (" . mysqli_connect_errno() . ")";
  exit($msg);
}

// make query to get results
$result = mysqli_query($con,$sql);

//fetch the resulting rows as an array
$cabins = mysqli_fetch_all($result,MYSQLI_ASSOC);

// echo "<pre>";
// print_r($cabins);
//  echo "</pre>";

?>