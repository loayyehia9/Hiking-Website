<?php include "HikerHome.php"; ?>


<html>
<head>
	<title></title>
</head>
<!--style -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">



<div class="wrapper">
<div class="main_container">
<div class="item">
<style> <?php include "Styles/productDetail.css"; ?> </style>
<?php
$sql = mysqli_query($conn, "SELECT * FROM products WHERE ID= '".$_GET['<!?>']."'-255");
$av = mysqli_query($conn, "SELECT rating FROM Rating WHERE product_id='".$_GET['<!?>']."'-255");
$sum = 0;
$i=0;
$rate1=0;
$rate2=0;
$rate3=0;
$rate4=0;
$rate5=0;

while($row= mysqli_fetch_array($av)){
	if($row['rating'] == 1){
		$rate1++;
	}
	if($row['rating'] == 2){
		$rate2++;
	}
	if($row['rating'] == 3){
		$rate3++;
	}
	if($row['rating'] == 4){
		$rate4++;
	}
	if($row['rating'] == 5){
		$rate5++;
	}
	
   $sum += $row['rating'];
   $i++;
}
?>

<?php
while($row = mysqli_fetch_array($sql)){
 ?>

    <div class="comp">
    	
 				<img name="image" src="Images/<?php echo $row['productImg']?>">
				<h4><?php echo "product Name: " .$row["productName"] ?></h4>
				<h4><?php echo "product Description: " .$row["productDescription"] ?></h4>
				<h4><?php echo "product Price: " .$row["productPrice"]. '$' ?></h4>
				<h4 class="rate"><?php
				
				if ($i == 0){
				$i = 1;
				echo "Average Rating: ".number_format((float)$sum/$i, 2, '.', '');}
				else {
					echo "Average Rating: ".number_format((float)$sum/$i, 2, '.', '');
				}

				 ?></h4>
				
				<h4 class="fas fa-star" id="rat">
					<?php echo " : " .$rate1  ?></h4><br>
				
				<h4 class="fas fa-star" id="rat">
				<h4 class="fas fa-star" id="rat">
					<?php echo " : ".$rate2 ?></h4><br>
				
				
				<h4 class="fas fa-star" id="rat">
				<h4 class="fas fa-star" id="rat">
				<h4 class="fas fa-star" id="rat">
					<?php echo " : ".$rate3 ?></h4><br>
				
				<h4 class="fas fa-star" id="rat">
				<h4 class="fas fa-star" id="rat">
				<h4 class="fas fa-star" id="rat">
				<h4 class="fas fa-star" id="rat">
					<?php echo " : ".$rate4 ?></h4><br>
				
				<h4 class="fas fa-star" id="rat">
				<h4 class="fas fa-star" id="rat">
				<h4 class="fas fa-star" id="rat">
				<h4 class="fas fa-star" id="rat">
				<h4 class="fas fa-star" id="rat">
					<?php echo " : ".$rate5 ?></h4><br>
				
					</div>


 <?php
 } 
 ?>
 <script>
 	function plus(){
 		document.getElementById('add').value = ++document.getElementById('add').value;
 	}
 	function minus(){
 		if(document.getElementById('add').value <= 1){
 			document.getElementById('add').value = 1;
 			return;
 		}
 		document.getElementById('add').value = --document.getElementById('add').value;
 	}
 </script>

<div class="revi">

<h3>Reviews</h3>	
 <?php
 $rev = mysqli_query($conn, "SELECT review,email FROM Rating WHERE product_id='".$_GET['<!?>']."'-255");
while($row = mysqli_fetch_array($rev)){
 ?>
 	<h4><?php echo $row["email"]. ":"?>
 	<?php echo $row["review"] .'<br>' ?>
	 </h4>	

<?php
}?>		
</div>


<div class="container">

	<div class="star-widget">
		
<form method="post" action="">
		

		<input type="radio" name="rate" id="rate-5"value="5">
		<label for="rate-5" class="fas fa-star" title="rate-5"></label>
		<input type="radio" name="rate" id="rate-4"value="4">
		<label for="rate-4" class="fas fa-star" title="rate-4"></label>
		<input type="radio" name="rate" id="rate-3"value="3">
		<label for="rate-3" class="fas fa-star" title="rate-3"></label>
		<input type="radio" name="rate" id="rate-2"value="2">
		<label for="rate-2" class="fas fa-star" title="rate-2"></label>
		<input type="radio" name="rate" id="rate-1" value="1">
		<label for="rate-1" class="fas fa-star" title="rate-1"></label>
		


		 
			<header></header>
			<div class="textarea">
				<textarea cols="30" placeholder="Review the product" name="review"></textarea>
			</div>
			<div class="btn">
				<button type="submit" name="submit">Post Review</button>

				

			</div>

	


	</div>
</div>
	<div class="cart">
				<h4> quantity: <br><span id="minus" class="fas fa-minus" onclick="minus()"></span> <input value= "1" id="add" type="text" name="quant" readonly> <span id="plus"  onclick="plus()" class="fas fa-plus"></span></h4>
				<button type= "submit" name="cart">Add To Cart</button>
</div>
	</form>


</div>
</div>
</div> 

</body>
</html>

 <?php

if (isset($_POST['cart'])) {
	
	$image = mysqli_query($conn,"SELECT productImg , productPrice FROM products WHERE ID = '".$_GET['<!?>']."'-255 ");
	$sql = mysqli_query($conn,"SELECT product_id FROM user_cart WHERE product_id= '".$_GET['<!?>']."'-255 AND email='".$_SESSION['email']."'");
	if($r = mysqli_fetch_assoc($sql)){
		echo '<script>alert("Error, Item already Inserted")</script>';
		return;
	}
	while ($row= mysqli_fetch_array($image)){
		$quant = $row['productPrice']*$_POST['quant'];
		mysqli_query($conn, "INSERT INTO user_cart (product_id, productPrice ,email , image)
		VALUES ('".$_GET['<!?>']."'-255,'$quant' ,'$_SESSION[email]', '$row[productImg]')");
	
}

}

if(isset($_POST['submit'])){
	if($_POST['review'] == ""){
		echo '<script>alert("Error: Please write review !?")</script>';	
		return;
	}

	$sql = mysqli_query($conn, "INSERT INTO Rating (product_id, email, rating, review)
	VALUES ('".$_GET['<!?>']."'-255,'$_SESSION[email]','$_POST[rate]', '$_POST[review]')");
   header("Refresh: 0.1");	
}

?>