<?php include ('MenuProduct.php')?>
<!DOCTYPE html>
<html>
<head>
  <title>Delete Product</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style> 
     <?php include "Styles/deletep.css" ?>
  </style>
</head>
<body>
  <form action='' method='POST'>  
  <?php include "dB.php"; ?>
  <div class="register">
  <h1>Delete Product</h1>
  
   <p style="visibility:hidden;"><b>ID</b></p>
  
  <?php
  $result = mysqli_query($conn, "SELECT * FROM products");

      // output data of each row
      while($row = mysqli_fetch_array($result)){
        $id = $row['ID'];  
        $pN = $row['productName'];
        $pD = $row['productDescription'];
        $p = $row['productPrice'];
        $pI = $row['productImg'];  
        ?>
        <br><br>
        <p style="visibility:hidden;"><?= $id ?></p>

        <?php

        echo "<img src='Images/".$pI."''>";
        echo "<br>";
        echo"product name: " .$pN."<br>"; 
        echo"product description: " .$pD ."<br>"; 
       echo"product price: " . $p ."$<br>"; 
        ?>
        
   select product: <input type='checkbox' name='delete[]' value='<?= $id ?>'>
   
  
     <?php
   }
  ?>    

<div class ="r">
<br><br><input type= 'submit' name='sub' value="Delete">
 </div>
  </div>
</form>
<?php
  if(isset($_POST['sub'])){
    if(isset($_POST['delete'])){
      foreach($_POST['delete'] as $dele){
        mysqli_query($conn, "DELETE FROM products WHERE ID = '" .$dele. "'");
     }
   }  
      else{
         echo "ERROR U SHOULD SELECT USER TO DELETE IT";
        }
        header("refresh: 0.1");  
  }  
?>
</body>
</html>