<?php 
foreach($cabins as $cabin){ ?>
  <article>
    <h2><?php echo $cabin['cabinType'] ?></h2>
    <div><img src="images/<?php echo $cabin['photo'] ?>" alt="cabin name here"></div>
    <p><span>Details: </span><?php echo $cabin['cabinDescription'] ?></p>
    <p><span>Price per night: </span><?php echo '$'.$cabin['pricePerNight'] ?></p>
    <p><span>Price per week: </span><?php echo '$'.$cabin['pricePerWeek'] ?></p>
  <?php 
    if($admin){ 
  ?>
    <a href="updateCabin.php?id=<?php echo urlencode($cabin['cabinId']) ?>" class='button'>Update Cabin</a>
    <a href="deleteCabin.php?id=<?php echo urlencode($cabin['cabinId']) ?>" class='button delete'>Delete Cabin</a>
        
  <?php   
    }
  ?>

      
    </article>
<?php 
}

?>