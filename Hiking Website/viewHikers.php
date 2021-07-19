<?php include "AdminHome.php"; ?>
<?php include "dB.php"; ?>

<div class ="content"> 
<div class = wrapper> 
<head>
  
<title>send Message</title>
<style>
        <?php include "Styles/viewhikers.css";
        ?>
    </style>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
</head>
<br>
<body>
<form method="POST" action="">
<div class="register">
  
<h1>Hikers</h1>
<br><br>
<table class="table table-hover">
  <tr>
  
   <td style="visibility:hidden;"><b>ID</b></td>
   <td><b>First Name</b></td>
    <td><b>Last Name</b></td>
    <td><b>Email</b></td>
    <td><b>Image</b></td>
    
  
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
  <td><?= $fN ?></td>
  <td><?= $lN ?></td>
  <td><?= $e ?></td>
  <td><img src="Images/<?= $i ?>"> </td>
		
  
 
  
</tr>
<?php
}
?>
</table>
</div>

</form>
</body>
</div>
</div>