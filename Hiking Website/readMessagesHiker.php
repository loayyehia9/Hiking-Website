<div class="wrapper">
<?php include "dB.php";
include "HikerHome.php";
?>
<head>
<title>Messages</title>
 
    <style>
    <?php include "Styles/oner.css"?>
    </style>
</head>

<div class="main_container">
<div class="item">  

<form method="POST" action="">

<div class="mes">
 <?php
 
$result = mysqli_query($conn, "SELECT * FROM chat WHERE Receiver='".$_SESSION['email']."' AND Status= 'Delivered'");
// output data of each row
if(mysqli_num_rows($result) == 0){
  echo "<h1>There are no new Messages</h1>";
}
while($row = mysqli_fetch_array($result)){
  $id = $row['ID'];  
  $sender = $row['Sender'];
  $message = $row['Message'];  
  echo "<br><br>";
   echo "From: ".$sender. "<br>"; 
   echo "Message: " .$message; 
?>
  <br><a href="replyHiker.php?<!?>=<?php echo $row["Sender"];?>">Reply</a>
  
<?php
}
?>
</div>

</form>

</div>
</div>
</div>