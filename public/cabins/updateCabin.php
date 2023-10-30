<?php 
require_once('../../private/initialize.php');
include(SHARED_PATH . '/header.php');



$id=(int)$_GET['id'];

$selectSql = "select cabinType,cabinDescription,pricePerNight,pricePerWeek,photo from cabin where cabinId = $id";

// make query to get results
$selectResult = mysqli_query($con,$selectSql);

//fetch the resulting rows as an array
$cabin = mysqli_fetch_array($selectResult,MYSQLI_ASSOC);

// echo "<pre>";
// print_r($cabin);
// echo "</pre>";


?>
<?php 
if(isset($_POST['submit'])){
// validate inputted data
  $cabinType = $_POST['cabinType'];
  $cabinDescription = $_POST['cabinDescription'];
  $pricePerNight = $_POST['pricePerNight'];
  $pricePerWeek = $_POST['pricePerWeek'];
  $photo = $_POST['photo'];
  $errors = [];

  if($pricePerWeek<$pricePerNight){
    $errors[] = "pricePerWeek must be greater than pricePerNight";
  }
  if(empty($cabinType)){
    $errors[] = "cabinType is required";
  }
  if(empty($cabinDescription)){
    $errors[] = "cabinDescription is required";
  }
  if(empty($pricePerNight)){
    $errors[] = "pricePerNight is required";
  }
  if(empty($pricePerWeek)){
    $errors[] = "pricePerWeek is required";
  }
  if(empty($photo)){
    $errors[] = "photo is required";
  }
  if(!empty($errors)){
    foreach($errors as $error){
      echo "<p class='error'>$error</p>";
    }
  }else{
    // update cabin
    $updateSql = "update cabin set cabinType='$cabinType',cabinDescription='$cabinDescription',pricePerNight='$pricePerNight',pricePerWeek='$pricePerWeek',photo='$photo' where cabinId=$id";
    $updateResult = mysqli_query($con,$updateSql);
    if($updateResult){
      header("Location:modifyCabin.php");
    }else{
      echo "<p class='error'>Update cabin failed</p>";
    }
  }

  
}
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?id=<?php echo htmlspecialchars($id)?>"  method='post' class='updateCabin'>
<h2>Update Cabin</h2>
<input type="hidden" name="cabinId" value="<?php echo htmlspecialchars($id)?>">

<div class="form-group">
  <label for="cabinType">cabinType</label>
  <input type="text" name="cabinType" id="cabinType" class='form-control' value="<?php echo htmlspecialchars($cabin['cabinType'])?>">
</div>
<div class="form-group">
  <label for="cabinDescription" style="vertical-align:top">cabinDescription</label>
  <textarea name="cabinDescription" id="cabinDescription" cols="30" rows="5"><?php echo htmlspecialchars($cabin['cabinDescription']) ?></textarea>
  
</div>

<div class="form-group">
  <label for="pricePerNight">pricePerNight</label>
  <input type="text" name="pricePerNight" id="pricePerNight" class='form-control' value="<?php echo htmlspecialchars($cabin['pricePerNight'])?> ">
</div>
<div class="form-group">
  <label for="pricePerWeek">pricePerWeek</label>
  <input type="text" name="pricePerWeek" id="pricePerWeek" class='form-control' value="<?php echo htmlspecialchars($cabin['pricePerWeek'])?> ">
</div>
<div class="form-group">
  <label for="photo">Upload cabin image</label>
  <input type="text" name="photo" id="photo" class='form-control' value="<?php echo htmlspecialchars($cabin['photo'])?>" >
</div>
<div>
  <button type="submit" name='submit'>Submit</button>
</div>
</form>
<?php include(SHARED_PATH . '/footer.php'); ?>