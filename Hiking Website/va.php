<?php include "dB.php";
include "Auditor.php";
?>
<div class ="content"> 
<div class = wrapper> 
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
 
$result = mysqli_query($conn, "SELECT DISTINCT Receiver FROM chat where Sender='".$_GET['!?']."'");
// output data of each row
while($row = mysqli_fetch_array($result)){
  $receiver = $row['Receiver'];
  echo "<br><br>";
  echo "To: ".$receiver. "<br>"; 
   
?>
<a href="vc.php?!?=<?php echo $row['Receiver']; ?>">view Chat</a>
<?php 
}
?>
</div>

</form>
</div>
</div>