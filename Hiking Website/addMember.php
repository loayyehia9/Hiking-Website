<title>Members</title>
<?php include "menugroup.php"; ?>
<?php include "dB.php"; ?>

<head>
  <style>
  <?php include "Styles/addMember.css" ?>
</style>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<br>
<body>
<form method="POST" action="">
<div class="register">
<table class="table table-hover">
  <tr>
  
   <td style="visibility:hidden;"><b>ID</b></td>
   <td><b>Image</b></td>
   <td><b>First Name</b></td>
    <td><b>Last Name</b></td>
    <td><b>add to group</b></td>
    
  
  </tr>

  <?php
$result = mysqli_query($conn, "SELECT * FROM Registration WHERE userType='1'");

// output data of each row
while($row = mysqli_fetch_array($result)){
  $id = $row['ID'];  
  $fN = $row['firstName'];
  $lN = $row['lastName'];
  $e = $row['email'];
  $p = $row['password']; 
  $i = $row['Image']; 
  ?>
  <br><br>
  <td style="visibility:hidden;"><?= $id ?></td>
   <td><img src="Images/<?= $i ?>"> </td>
  <td><?= $fN ?></td>
  <td><?= $lN ?></td>
  <td><span class="fas fa-plus">Add Memeber:<br><br><input type="submit" name="sub[]" value="<?php echo $e; ?>" ></span></td>
</tr>
<?php
}
?>

</table>
</div>
</form>
</body>


<?php
 if(isset($_POST['sub'])){
  foreach($_POST['sub'] as $i){
      $sql = mysqli_query($conn, "SELECT Taxes FROM groups WHERE groupId='".$_GET['<!?>']."'-255");
      $sq = mysqli_query($conn, "SELECT email FROM Members WHERE groupId='".$_GET['<!?>']."'-255");
      while($rows = mysqli_fetch_array($sq)){
        if($rows['email'] == $i){
        echo '<script>alert("Error, Hiker Already in this group")</script>';
          return; 
        }
      }
     if($rows = mysqli_fetch_assoc($sql)){
        mysqli_query($conn, "INSERT INTO Members(email, groupId, Taxes) VALUES ('$i','".$_GET['<!?>']."'-255 , '$rows[Taxes]')");
        echo '<script>alert("Done, Data Inserted")</script>';
        }
      }
    }
 
?>