<?php

include "MenuProduct.php";
include "dB.php";
$errors = array();

 $sql = "SELECT * FROM products WHERE ID='".$_GET['<!?>']."'-255";
 $result = mysqli_query($conn, $sql);

 if($result)
 {
    $row = mysqli_fetch_array($result);
 }
 // update
 if(isset($_POST['update']))
 {
  if (empty($_POST['productName']) || 
      empty($_POST['productDescription']) || 
      empty($_POST['productPrice'])){
    array_push($errors, "Please fill in all requirements!");  
      }
    else{
    
     mysqli_query($conn, "UPDATE `products` SET 
     `productName` = '$_POST[productName]',  
     `productDescription` = '$_POST[productDescription]', 
     `productPrice` = '$_POST[productPrice]' 
     WHERE ID='".$_GET['<!?>']."'-255");
  
     }
  }

?>
<html>
 <head> 
  <title> Wishlist </title>
  <link rel="stylesheet" href="Styles/products.css">
  <style>
      <?php include "Styles/p.css";   ?>
  </style>
  <head>
  <body>  
    <div class="register">
      <h2>product update</h2>
         <br><br><br><br>
   <form method = "post">
     <div class = "div1">
     <label> Product Name </label> <br> <input type = "text" name = "productName" class = "txtStyle"  value = "<?php echo $row['productName']; ?>"> <br> <br>
     <label> Product Description </label> <br> <input type = "text" name = "productDescription" class = "txtStyle" value = "<?php echo $row['productDescription']; ?>"> <br> <br>
     <label> Product Price </label> <br> <input type = "text" name = "productPrice" class = "txtStyle" value = "<?php echo $row['productPrice']; ?>"> <br> <br>
     <div class = "div2">
     <input type = "submit" name = "update" value = "Update" class = "btnStyle">

     </div>
     </div>
   </form>  
   </div> 
  </body>
</html>

<?php
  if(isset($_POST['update'])){
    header("refresh: 0.1");
  }
?>