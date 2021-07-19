<?php include "HikerHome.php"; ?>


<html>
<head>
	<title>Review</title>
</head>
<!--style -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">



<div class="wrapper">
<div class="main_container">
<div class="item">
<style> <?php include "Styles/groupdetails.css"; ?> </style>
<?php
$sql = mysqli_query($conn, "SELECT * FROM groups WHERE groupId= '".$_GET['<!?>']."'-255");
$av = mysqli_query($conn, "SELECT rating FROM rate_groups WHERE groupid='".$_GET['<!?>']."'-255");
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
    	
 				<img name="image" src="Images/<?php echo $row['groupImage']?>">
				<h4><?php echo "group Name: " .$row["groupName"] ?></h4>
				<h4><?php echo "group Description: " .$row["groupDescription"] ?></h4>
				<h4><?php echo "group difficulty: " .$row["groupDifficulty"]  ?></h4>
				<h4><?php echo "group distance: " .$row["groupDistance"]  ?></h4>
					<h4><?php echo "group duration: " .$row["groupDuration"]  ?></h4>
						<h4><?php echo "taxes: " .$row["Taxes"]  ?></h4>

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
 

<div class="revi">

<h3>Reviews</h3>	
 <?php
 $rev = mysqli_query($conn, "SELECT review,email FROM rate_groups WHERE groupid='".$_GET['<!?>']."'-255");
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
				<textarea cols="30" placeholder="Review the group" name="review"></textarea>
			</div>
			<div class="btn">
				<button type="submit" name="submit">Post Review</button>

				

			</div>

	


	</div>
</div>
<input type="submit" name="jG" value="Join Group" class="jG">
	</form>


</div>
</div>
</div> 

</body>
</html>

 <?php
if(isset($_POST['jG'])){
	$sql = mysqli_query($conn, "SELECT groupId FROM Members WHERE email='".$_SESSION['email']."'");
	while($row = mysqli_fetch_array($sql)){
		if($row['groupId'] == $_GET['<!?>']-255){
			echo '<script>alert("Error, You Are Already in this group")</script>';
			return;
		}
	}
	$r = mysqli_query($conn, "SELECT Taxes FROM groups WHERE groupId= '".$_GET['<!?>']."'-255");
	if($row = mysqli_fetch_assoc($r)){
	mysqli_query($conn, "INSERT INTO Members(email, groupId, Taxes) VALUES ('$_SESSION[email]', '".$_GET['<!?>']."'-255, '$row[Taxes]')");
	echo '<script>alert("Done, You Joined the group")</script>';
	}	
}
if (isset($_POST['cart'])) {
	
	$image = mysqli_query($conn,"SELECT groupImage , Taxes FROM groups WHERE groupid = '".$_GET['<!?>']."'-255 ");
	while ($row= mysqli_fetch_array($image)){
		$quant = $row['productPrice']*$_POST['quant'];
	
	
}

}

if(isset($_POST['submit'])){
	if($_POST['review'] == ""){
		echo '<script>alert("Error: Please write review !?")</script>';	
		return;
	}

	$sql = mysqli_query($conn, "INSERT INTO rate_groups  (groupid, email, rating, review)
	VALUES ('".$_GET['<!?>']."'-255,'$_SESSION[email]','$_POST[rate]', '$_POST[review]')");
   header("Refresh: 0.1");	
}

?>