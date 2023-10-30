  <?php
  require_once('../../private/initialize.php');
  $pageName='allCabins'; 
  include(SHARED_PATH . '/header.php');
  ?>



  <nav></nav>
  <main>
    <!-- Display all cabins -->
<?php 
$admin = false;
require_once(PRIVATE_PATH.'/displayCabins.php');

?>
  </main>

  <?php include(SHARED_PATH . '/footer.php'); ?>
