<title>Remove Hikers</title>
<?php
include "menugroup.php";
?>

<style>
  <?php include "Styles/removeMember.css" ?>
</style>
<?php
include "dB.php";

    $sql = mysqli_query($conn, "SELECT * FROM Members");
   ?>
<form method="POST" action=""> 
<div class="register">
    <?php
    while($row = mysqli_fetch_array($sql)){
        $email = $row['email'];
        $id = $row['ID'];
        
      $result = mysqli_query($conn, "SELECT groupName, groupImage FROM groups WHERE groupId='".$row['groupId']."'");
      while($row = mysqli_fetch_array($result)){
   
    ?>
    <img src='Images/<?php echo $row['groupImage'] ?>'> 
    <h1>Group Name:  <?php echo $row['groupName']?> </h1>  
    <h1 class="m">Members</h1>

    <h1><?php echo $email .":"?>    
    <input type='checkbox' name='arrayId[]' class="i" value='<?= $id ?>'>
  </h1>
    
    <?php
    }
}
    ?>

<input type="submit" name="sub" value="Remove Hiker">
</div>  
</from>




<?php 
if(isset($_POST['sub'])){
if(isset($_POST['arrayId'])){

       foreach($_POST['arrayId'] as $i)
            $del = mysqli_query($conn, "DELETE FROM Members WHERE ID='$i'"); 
            echo '<script> alert("Done, Hiker Removed Sucessfully")</script>';
    }
    
 else{
    echo '<script> alert("You Do not select group")</script>';
    return;
  }
  header("refresh: 0.1");  
}

?>
