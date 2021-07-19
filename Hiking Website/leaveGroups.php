
<?php
include "HikerHome.php";
?>
<style>
  <?php include "Styles/viewgroup.css" ?>
</style>

<form method="POST" action="">

<div class="wrapper">
<div class="main_container">
<div class="item">  

<?php
include "dB.php";
 	$sql = mysqli_query($conn, "SELECT groupId FROM Members WHERE email='".$_SESSION['email']."'");
   ?>
 	<div class='register'>
    <h1>Groups</h1><br><br><br>
    <?php
     while($row=mysqli_fetch_array($sql)){
        $result = mysqli_query($conn, "SELECT * FROM groups WHERE groupId='".$row['groupId']."'"); 
  while($row = mysqli_fetch_array($result)){
    $id = $row['groupId'];
    ?>
     <div class='row'>
        <div class='col'>
		       <div class='product'>
    <img src='Images/<?php echo $row['groupImage'] ?>'> 
    <h2>Group Name:  <?php echo $row['groupName']?> </h2>   
    <h2>Location: <?php echo $row['groupLocation'] ?> </h2>
    <h2>Description: <?php echo $row['groupDescription']?></h2>
    <h2>Difficulty: <?php echo $row['groupDifficulty']?></h2>
    <h2>Distance:  <?php echo $row['groupDistance']?> km | Duration: <?php echo $row['groupDuration']?>hours</h2>
   

    <p class="i">select group to Leave on It: <input type='checkbox' name='arrayId[]' class="i" value='<?= $id ?>'></p><br><br><br>
   	</div>
    
<?php
}
     }
?>
  
</div>
</div>
</div>
<input type="submit" name="su" value="Leave Group">
</form>



<?php
 if(isset($_POST['su'])){
if(isset($_POST['arrayId'])){
    $check = mysqli_query($conn, "SELECT groupId, email FROM Members");
        while($row = mysqli_fetch_array($check)){
        foreach($_POST['arrayId'] as $i){
           if($row['groupId'] == $i && $row['email'] == $_SESSION['email']){
              $del = mysqli_query($conn, "DELETE FROM Members WHERE groupId='".$i."' AND email='".$_SESSION['email']."'"); 
              echo '<script> alert("Done, You have been Leaved group Sucessfully")</script>';
              header("refresh: 0.1");  
             
           }
        }
      } 
    }
      else{
        echo '<script> alert("You Do not select group")</script>';
        return;
      }
      
    }
?>
