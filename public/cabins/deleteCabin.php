<?php 
require_once('../../private/initialize.php');
include(SHARED_PATH . '/header.php');

$pageName ='delete Cabin';


$id=(int)$_GET['id'];
$cabinId = '';
foreach($cabins as $index=>$cabin){
  if($id=== (int)$cabin['cabinId']){
    $cabinId = (int)$index;
  }
}

// echo "<pre>";
// print_r($cabins);
// echo "</pre>";


?>
  <?php 

if(isset($_POST['submit'])){
  echo 'test';
  $id=(int)$_POST['id'];
  $deleteCabinSql = "delete from cabin where cabinId=$id limit 1";
  $result = mysqli_query($con,$deleteCabinSql);
  // for delete statement, $result is true/false
  if($result){
    header('location:modifyCabin.php');
    exit;
  }else{
    echo mysqli_error($con);
    $con->close();
    exit;
  }
}
?>

<div class='deleteCabin'>
  <form action="deleteCabin.php" method='post'>
    <h3>Are you sure to delete this cabin "<?php echo $cabins[$cabinId]['cabinType'] ?>" </h3>
    <input type="hidden" name="id" value="<?php echo $id?>">
    <div class="operation"><button type='submit' name='submit'> Delete this cabin</button></div>
  </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>