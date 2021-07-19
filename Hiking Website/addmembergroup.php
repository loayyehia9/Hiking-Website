<title>Add Member To Group</title>
<?php
include "menugroup.php";
?>

<style>
<?php include "Styles/addmembergroup.css" ?></style>
<?php
include "dB.php";

   
  $sql= "SELECT * FROM groups";
  $result = mysqli_query($conn, $sql);
  ?>
  <form method="POST" action=""> 
  <div class='register'>

  <?php
  while($row = mysqli_fetch_array($result)){
      $id = $row['groupId'];
      ?>
     <div class='row'>
     <div class='col'>
     <img src='Images/<?php echo $row['groupImage']?>'>
       
  <div class='over'>
 </div>
 </div>
    <div class='rate'>
        <h1>Group Name: <?php echo $row['groupName']?><br>
        <a href="addMember.php?<!?>=<?php echo $row['groupId']+255 ?>" class="l">view</a>
        </h1>
    <br>
    </div>
    </div>
<?php
}
?>

