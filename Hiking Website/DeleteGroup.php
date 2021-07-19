<title>Delete Group</title>
<?php include ('menugroup.php')?>
<!DOCTYPE html>
<html>
<head>
 

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style> 
     <?php include "Styles/deleteg.css" ?>
  </style>
</head>
<body>
  <form action='' method='POST'>  
  <?php include "dB.php"; ?>
  <div class="register">
    <h1>Delete Group</h1>
 
   <p style="visibility:hidden;"><b>ID</b></p>
  
  <?php
  $result = mysqli_query($conn, "SELECT * FROM groups");

      // output data of each row
      while($row = mysqli_fetch_array($result)){
        $id = $row['groupId'];  
        $groupName = $row['groupName'];
        $groupLocation = $row['groupLocation'];
        $groupDescription = $row['groupDescription'];
        $groupDifficulty = $row['groupDifficulty'];
        $groupImage = $row['groupImage'];
         
        ?>
        <br><br>
        <p style="visibility:hidden;"><?= $id ?></p>
        <?php
       echo  "<img src='Images/".$groupImage."''>";
       echo "<br><br>";
        echo "groupName: " .$groupName."<br>";
        echo "groupLocation: " .$groupLocation."<br>";
        echo "groupDescription: ".$groupDescription."<br>";
        echo "groupDifficulty: " .$groupDifficulty. "<br>";
         ?>
        
     select group: <input type='checkbox' name='delete[]' value='<?= $id ?>' >
   

     <?php
   }
  ?>    

<div class ="r">
<br><br><input type= 'submit' name='sub' value="Delete">
     </div>
   </div>
</form>
<?php
  if(isset($_POST['sub'])){
    if(isset($_POST['delete'])){
      foreach($_POST['delete'] as $dele){
        mysqli_query($conn, "DELETE FROM groups WHERE groupId = '" .$dele. "'");
        mysqli_query($conn, "DELETE FROM Members WHERE groupId = '" .$dele. "'");
        
     }
   }  
      else{
         echo "ERROR U SHOULD SELECT A GROUP TO DELETE IT";
        }
        header("refresh: 0.1");  
  }  
?>
</body>
</html>