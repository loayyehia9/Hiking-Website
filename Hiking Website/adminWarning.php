<?php include "dB.php";
      include "HR.php";
?>
<div class ="content"> 
<div class = wrapper> 
<head>
<title>HR</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    <?php include "Styles/adminWarning.css"?>
    </style>
</head>
<br>

<form method="POST" action="">

<div class="box">
 <?php
 
$result = mysqli_query($conn, "SELECT * FROM hrau WHERE adminemail='".$_SESSION['email']."' OR investigate= 'pending investagation'");
// output data of each row
while($row = mysqli_fetch_array($result)){
  $id = $row['ID'];  
  $ademail = $row['adminemail'];
  $auemail = $row['auditoremail'];
  $message = $row['message'];
  $penalty = $row['penalty'];  
  echo "<br><br>";
  echo "Auditor: " . $auemail . "<br>";
  echo "Admin: " . $ademail . "<br>";
  echo "Message: " . $message . "<br>";
  echo "Penalties so far: " . $penalty . "<br>";
?>
  <br>
  <a href="penalty.php?id= <?php echo $row['ID'];?>">Confirm Message</a>

<?php 
}
?>
</div>

</form>
</div>
</div>