<?php 
require_once('../../private/initialize.php');

$pageName= 'addNewCabin';
include(SHARED_PATH . '/header.php');
?>

<?php 

if(isset($_POST['submit'])){
  $cabin =[];
  $cabin['cabinType'] = $_POST['cabinType'];
  
  
  $cabin['cabinDescription'] = $_POST['cabinDescription'];
  $cabin['pricePerNight'] = (int)$_POST['pricePerNight'];
  $cabin['pricePerWeek'] = (int)$_POST['pricePerWeek'];
  $cabin['photo'] = $_POST['photo']?$_POST['photo']:'testCabin.jpg';
  $errors =[];
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
  //If there are some errors, list the errors
  if(!empty($errors)){
    foreach($errors as $error){
      echo "<p class='error'>$error</p>";
    }
  }else{
    // insert cabin if no error
    $insertSql = "insert into cabin(cabinType,cabinDescription,pricePerNight,pricePerWeek,photo) values('$cabinType','$cabinDescription','$pricePerNight','$pricePerWeek','$photo')";
    $insertResult = mysqli_query($con,$insertSql);
    if($insertResult){
      header("Location:modifyCabin.php");
    }else{
      echo "<p class='error'>Insert cabin failed</p>";
    }
  }
}else{
  $cabin =[];
    $cabin['cabinType'] = '';
    $cabin['cabinDescription'] = '';
    $cabin['pricePerNight'] = '';
    $cabin['pricePerWeek'] = '';
    $cabin['photo'] = '';
  
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