<?php 
require_once('../../private/initialize.php');

$pageName= 'addNewCabin';
include(SHARED_PATH . '/header.php');
?>
//insert new cabin
<?php 
if(isset($_POST['submit'])){
  $cabinType = $_POST['cabinType'];
  $cabinDescription = $_POST['cabinDescription'];
  $pricePerNight = $_POST['pricePerNight'];
  $pricePerWeek = $_POST['pricePerWeek'];
  $photo = $_POST['photo']?$_POST['photo']:'villa.jpg';
  $errors = [];
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
    // insert cabin
    $insertSql = "insert into cabin(cabinType,cabinDescription,pricePerNight,pricePerWeek,photo) values('$cabinType','$cabinDescription','$pricePerNight','$pricePerWeek','$photo')";
    $insertResult = mysqli_query($con,$insertSql);
    if($insertResult){
      header("Location:modifyCabin.php");
    }else{
      echo "<p class='error'>Insert cabin failed</p>";
    }
  }
}?>
  
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method='post' class='insertCabin'>

<div class="form-group">
  <label for="cabinType">cabinType</label>
  <input type="text" name="cabinType" id="cabinType" class='form-control'>
</div>
<div class="form-group">
  <label for="cabinDescription">cabinDescription</label>
  <textarea name="cabinDescription" id="cabinDescription" cols="30" rows="5"></textarea>
</div>

<div class="form-group">
  <label for="pricePerNight">pricePerNight</label>
  <input type="text" name="pricePerNight" id="pricePerNight" class='form-control'>
</div>
<div class="form-group">
  <label for="pricePerWeek">pricePerWeek</label>
  <input type="text" name="pricePerWeek" id="pricePerWeek" class='form-control'>
</div>
<div class="form-group">
  <label for="photo">Upload cabin image</label>
  <input type="text" name="photo" id="photo" class='form-control'>
</div>
<div>
  <button type="submit" name='submit'>Submit</button>
</div>
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>