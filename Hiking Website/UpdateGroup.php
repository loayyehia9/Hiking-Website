<?php
include "menugroup.php";
?>

<style>
  <?php include "Styles/ug.css" ?>
</style>
<?php
include "dB.php";
 
    
  $sql= "SELECT * FROM groups";
  $result = mysqli_query($conn, $sql);
  ?>
  <div class='register'>
    <h1>Updating Groups</h2>
  <br><br><br><br><br><br>
  <?php
  while($row = mysqli_fetch_array($result)){
    ?>
     <div class='row'>
     <div class='col'>
     <img src='Images/<?php echo $row['groupImage'] ?>'>
      <br>
  
 <div class='over'>
 </div>
</div>
    <div class='rate'>
          <h1><a href="UpdateG.php?<!?>=<?php echo $row['groupId']+255 ?>">Update Group</a><h1>
          <h1> Group Name: <?php echo $row['groupName'] ?></h1>
          <h1>Location: <?php echo $row['groupLocation']?></h1>
          <h1>Description: <?php echo $row['groupDescription'] ?></h1>
          <h1>Difficulty: <?php $row['groupDifficulty']  ?></h1>
          <h1>Distance: <?php echo $row['groupDistance'] ?> km | Duration: <?php echo $row['groupDuration'] ?> hours</h1>
        <br>

    </div>
    </div>
<?php
}
?>