<?php 
require_once('../../private/initialize.php');
$pageName = 'adminMenu';
include(SHARED_PATH . '/header.php');

?>
<main>
<a href="addNewCabin.php?pageName=<?php echo urlencode('addNewCabin')?>">Add new cabin</a>
<a href="modifyCabin.php?pageName=<?php echo urldecode('modifyCabin') ?>&admin=<?php echo urldecode('true') ?>">Update and Delete cabin</a>


</main>
<?php include(SHARED_PATH . '/footer.php'); ?>