<?php
include "MenuProduct.php";
include "dB.php";
$errors = array();

 $productId = "";
 $productName= "";
 $productDescription= "";
 $productPrice= "";
 $productImg= "";

 
function getPosts(){
     $posts = array();
     $posts[0] = $_POST['productName'];
     $posts[1] = $_POST['productDescription'];
     $posts[2] = $_POST['productPrice'];
     $posts[3] = $_POST['productImg'];
     return $posts;
 }
 // insert
 if(isset($_POST['insert']))
 {
    if (empty($_POST['productName']) || 
      empty($_POST['productDescription']) || 
      empty($_POST['productPrice']) || 
      empty($_POST['productImg'])){
    array_push($errors, "Please fill in all requirements!");  
      }
    else{
    $sql = "SELECT productImg, productName FROM products WHERE productImg = '".$_POST['productImg']."'";
 	$result = mysqli_query($conn, $sql);
 	if($result){
 		if($row = $result->fetch_assoc()){
         if($row["productImg"] == $_POST['productImg'])
         {
 		die("ERROR");
 	}
 		}
 	}
     $data = getPosts();
     $insertQuery = "INSERT INTO products (`productName`, `productDescription`,`productPrice`,`productImg`) VALUES ('$data[0]', '$data[1]','$data[2]','$_POST[productImg]')";
     try
  {
     $insertResult = mysqli_query($conn, $insertQuery);
     
     if($insertResult)
     {
         if(mysqli_affected_rows($conn) > 0){
             print "item inserted";
         }else{
             print "item not inserted";
         }
     }
 }catch(Exception $ex){
       print "error insert" .$ex->getMessage();  
     }
 }
}
?>
<html>
 <head> 
  <title> Wishlist </title>
  <link rel="stylesheet" href="Styles/products.css">
<style>
    <?php include "Styles/products.css"; ?>
    </style>
  <head>
  <body>  
  <div class="container">
      <h2>Adding Product</h2>
             
        <br> <br>
   <form method = "post" action="">
          <?php include ('errors.php');?>
     <div class = "div1">
     <label> Product Name </label> <br> <input type = "text" name = "productName" class = "txtStyle"  value = "<?php print $productName; ?>"> <br> <br>
     <label> Product Description </label> <br> <input type = "text" name = "productDescription" class = "txtStyle" value = "<?php print $productDescription; ?>"> <br> <br>
     <label> Product Price </label> <br> <input type = "text" name = "productPrice" class = "txtStyle" value = "<?php print $productPrice; ?>"> <br> <br>
     <label> Upload your expected image </label> <br> <input type="file" name="productImg" class = "txtStyle" value = "<?php print $productImg; ?>"> <br> <br> 
     <div class = "div2">
     <input type = "submit" name = "insert" value = "Add" class = "btnStyle" >
     </div>
     </div>
 </div>
</div>
   </form>   
  </body>
</html>