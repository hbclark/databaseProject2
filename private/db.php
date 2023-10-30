<?php 
//  Connect to the database
$con = mysqli_connect('localhost','ch','123456a','sunnyspot');

// Select cabinType, cabinDescription, pricePerNight, pricerPerWeek ,photo from the database
$sql = 'select cabinId,cabinType, cabinDescription,pricePerNight,pricePerWeek,photo from cabin';

// make query to get results
$result = mysqli_query($con,$sql);

//fetch the resulting rows as an array
$cabins = mysqli_fetch_all($result,MYSQLI_ASSOC);

// echo "<pre>";
// print_r($cabins);
//  echo "</pre>";

?>