<?php include "HikerHome.php"; ?>
<?php include "dB.php"; ?>

<head>
<title>send Message</title>
 
    <style>
      <?php include "Styles/sendmessage.css";?>
    </style>
</head>
<div class="wrapper">
<div class="main_container">
<div class="item">  
    
<form method="POST" action="">
<div class="register">
  <?php
$result = mysqli_query($conn, "SELECT * FROM Registration WHERE userType='2'");

// output data of each row
while($row = mysqli_fetch_array($result)){
  $id = $row['ID'];  
  $fN = $row['firstName'];
  $lN = $row['lastName'];
  $e = $row['email'];
  $p = $row['password'];  
  ?>
  <br><br>
  <p style="visibility:hidden;"><?= $id ?></p>
  <?php
  echo "firstName: " .$fN. "<br>"; 
         echo "lastName: " .$lN. "<br>"; 
         echo "Email: " .$e. "<br>"; 
 
?>
<a href="message.php?!?=<?php echo $row["ID"]+255; ?>" class="u">send Message</a>
<?php
}
?>
</div>
</form>


</div>
</div>
</div>