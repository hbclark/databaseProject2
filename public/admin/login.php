<?php 
require_once('../../private/initialize.php');
include(SHARED_PATH . '/header.php');


?>

<main>

<?php 

echo $_SERVER['SCRIPT_NAME'].'<br>';
echo dirname(__FILE__);
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post' class='login'>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="text" name="password" id="password">
  </div>
  <div>
    <button type="submit" name='submit'>Submit</button>
  </div>
</main>




<?php include(SHARED_PATH . '/footer.php'); ?>