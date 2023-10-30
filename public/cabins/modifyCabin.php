<?php 
require_once('../../private/initialize.php');
//import header
$pageName = 'modifyCabin';
include(SHARED_PATH . '/header.php');

?>
<main>
<?php 
// Display all cabins with update and delete button
$admin = true;
require_once(PRIVATE_PATH.'/displayCabins.php');
?>
</main>
<?php include(SHARED_PATH . '/footer.php'); ?>

