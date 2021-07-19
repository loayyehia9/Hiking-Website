<?php
include "MenuProduct.php";
?>
<style>
<?php include "Styles/up.css" ?>
</style>
<?php

  include "dB.php";
   
  $sql= "SELECT * FROM products";
  $result = mysqli_query($conn, $sql);
  ?>
  <div class='register'>
      <h1>Updating Product</h1>
  <br><br><br><br><br><br>
  <?php
  while($row = mysqli_fetch_array($result)){
    ?>
     <div class='row'>
     <div class='col'>
    <img src='Images/<?php echo $row['productImg']?>'>
  </div>
<div class='rate'>
      <h1><a href="Update.php?<!?>=<?php echo $row['ID']+255 ?>">Update Product</a></h1>
        <h1><?php echo $row['productName'] ?></h1>
        <h1><?php echo $row['productDescription'] ?></h1>
    <h1><?php echo $row['productPrice'] ?>$</h1>
    <br>
    </div>
      </div>
      <?php 
}
?>