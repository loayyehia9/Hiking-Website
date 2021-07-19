<?php include "dB.php";
include "menuChatHike.php";
?>

<head>
<title>Messages</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    <?php include "Styles/rm.css"?>
    </style>
</head>
<br>

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
  <br><a href="reply.php?<!?>=<?php echo $row["Sender"];?>">Reply</a>
<?php 
}
?>
</div>

</form>
