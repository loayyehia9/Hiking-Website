<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
        <?php include "Styles/auditoradmin.css";?>
    </style>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
</head>
<body>
  <form action='' method='POST'>  
  <?php include "dB.php"; 
  include "Auditor.php";
  ?>
  <div class="register">
    <h1>Admins</h1>
  
   <p style="visibility:hidden;"><b>ID</b></p>
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
        
         echo "Email: " .$e. "<br>"; 
         echo "<br>";
         ?>
        
     <a href="va.php?!?=<?php echo $row["email"]; ?>" class="u">view</a>
  
  
     <?php
   }
  ?>