<title> Wishlist </title>
<?php

include "menugroup.php";
include "dB.php";
$errors = array();


 $sql = "SELECT * FROM groups WHERE groupId='".$_GET['<!?>']."'-255";
 $result = mysqli_query($conn, $sql);

 if($result)
 {
    $row = mysqli_fetch_array($result);
 }
 // update
 if(isset($_POST['update']))
 {
 
  if (empty($_POST['groupName']) || 
      empty($_POST['groupLocation']) || 
      empty($_POST['groupDescription']) || 
      empty($_POST['groupDistance']) || 
      empty($_POST['groupDuration'])){
    array_push($errors, "Please fill in all requirements!");
    }
    if($_POST['Taxes'] > 18){
      array_push($errors, "Number should be less than or equal 18");
    }
    else{
 
     $updateQuery = mysqli_query($conn, "UPDATE `groups` SET 
     `groupName` = '$_POST[groupName]',
     `groupLocation` = '$_POST[groupLocation]', 
     `groupDescription` = '$_POST[groupDescription]', 
     `groupDistance` = '$_POST[groupDistance]', 
     `groupDuration` = '$_POST[groupDuration]',
     `Taxes` = '$_POST[Taxes]'
      
     WHERE groupId='".$_GET['<!?>']."'-255");
  }
}
?>
<html>
 <head> 
  <title> Wishlist </title>
    <style>
        <?php include "Styles/addgroupcss.css";?>
    </style>
  <head>
  <body>  
         <div class = "register">
          <h2>Updating Group</h2>
          <br><br>
   <form method = "post">
          <?php include ('errors.php');?>
     <label> Group Name </label> <br> <input type = "text" name = "groupName" class = "txtStyle" value = "<?php echo $row['groupName']; ?>"> <br> <br>
     
     <label> Location </label> <br> <input type = "text" name = "groupLocation" class = "txtStyle" value = "<?php echo $row['groupLocation']; ?>"> <br> <br>
     <label> Description </label> <br> <input type = "text" name = "groupDescription" class = "txtStyle" value = "<?php echo $row['groupDescription']; ?>"> <br> <br>
     <label> Distance </label> <br> <input type = "text" name = "groupDistance" class = "txtStyle" value = "<?php echo $row['groupDistance']; ?>"> <br> <br>
     <label> Duration </label> <br> <input type = "text" name = "groupDuration" class = "txtStyle" value = "<?php echo $row['groupDuration']; ?>"> <br> <br>
     <label> Taxes </label> <br> <input type = "text" name = "Taxes" class = "txtStyle" value = "<?php echo $row['Taxes']; ?>"> <br> <br>
     
     <input type = "submit" name = "update" value = "Update" class = "btnStyle">

   </form>    
     </div>
  </body>
</html>
<?php 
   if(isset($_POST['update'])){
     header("refresh: 0.1");
   }
?>