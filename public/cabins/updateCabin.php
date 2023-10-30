<?php 
require_once('../../private/initialize.php');
include(SHARED_PATH . '/header.php');

$id=(int)$_GET['id'];

?>
<?php 
if(isset($_POST['submit'])){
// validate inputted data
  $cabin=[];
  $cabin['cabinId'] = $id;
  $cabin['cabinType'] = $_POST['cabinType'];
  $cabin['cabinDescription'] = $_POST['cabinDescription'];
  $cabin['pricePerNight'] = (int)$_POST['pricePerNight'];
  $cabin['pricePerWeek'] = (int)$_POST['pricePerWeek'];
  $cabin['photo'] = $_POST['photo']?$_POST['photo']:'testCabin.jpg';
  $errors = [];

  // check if cabinType is empty
  if(empty($cabin['cabinType'])){
    $errors[] = "cabinType is required";
  }
  // check if cabinDescription is empty
  if(empty($cabin['cabinDescription'])){
    $errors[] = "cabinDescription is required";
  }

  // check if price per night is empty and must be positive
  if(empty($cabin['pricePerNight'])){
    $errors[] = "pricePerNight is required and must be positive";
  }elseif($cabin['pricePerNight']<0){
    $errors[] ='pricePerNight must be positive!';
  }

  //check if pricePerWeek is empty and not more than 5 times the price per night.
  if(empty($cabin['pricePerWeek'])){
    $errors[] = "pricePerWeek is required";
  }elseif(($cabin['pricePerNight']*5)<$cabin['pricePerWeek']){
    $errors[]='Price per week is not more than 5 times the price per night';
  }

  
  if(!empty($errors)){
    foreach($errors as $error){
      echo "<p class='error'>$error</p>";
    }
  }else{
    // update cabin
    
    $updateSql = "UPDATE cabin SET ";
    $updateSql .= "cabinType='" . mysqli_real_escape_string($con, $cabin['cabinType']) . "', ";
    $updateSql .= "cabinDescription='" . mysqli_real_escape_string($con, $cabin['cabinDescription']) . "', ";
    $updateSql .= "pricePerNight='" . mysqli_real_escape_string($con, $cabin['pricePerNight']) . "', ";
    $updateSql .= "pricePerWeek='" . mysqli_real_escape_string($con, $cabin['pricePerWeek']) . "', ";
    $updateSql .= "photo='" . mysqli_real_escape_string($con, $cabin['photo']) . "' ";
    $updateSql .= "WHERE cabinId='" . mysqli_real_escape_string($con, $cabin['cabinId']) . "' ";
    $updateSql .= "LIMIT 1";   
    $updateResult = mysqli_query($con,$updateSql);
    if($updateResult){
      header("Location:modifyCabin.php");
    }else{
      echo "<p class='error'>Update cabin failed</p>";
    }
  }

  
}else{
  $selectSql = "select cabinType,cabinDescription,pricePerNight,pricePerWeek,photo from cabin where cabinId = $id";

// make query to get results
$selectResult = mysqli_query($con,$selectSql);

//fetch the resulting rows as an array
$cabin = mysqli_fetch_array($selectResult,MYSQLI_ASSOC);
}

?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?id=<?php echo htmlspecialchars($id)?>"  method='post' class='updateCabin'>
<h2>Update Cabin</h2>
<input type="hidden" name="cabinId" value="<?php echo htmlspecialchars($id)?>">

<div class="form-group">
  <label for="cabinType">cabinType</label>
  <input type="text" name="cabinType" id="cabinType" class='form-control' value="<?php echo htmlspecialchars($cabin['cabinType']);?>">
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