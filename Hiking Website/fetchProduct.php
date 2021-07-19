<style>
   <?php include "Styles/sp.css" ?>
	</style>

<?php
include "dB.php";
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "
	SELECT * FROM products 
	WHERE ID LIKE '%".$search."%' ||
        productName LIKE '%".$search."%'||
		productPrice LIKE '%".$search."%'";
		
}
else
{
	$query = "
	SELECT * FROM products ORDER BY ID ASC";
}
echo "<div class='register'>";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
		while($row = mysqli_fetch_array($result))
	{
		?>
			<img src="Images/<?php echo $row['productImg']?>">
		   <div class="comp">
				<h4><?php echo "product Name: " .$row["productName"] ?></h4>
				<h4><?php echo "product Description: " .$row["productDescription"] ?></h4>
				<h4><?php echo "product Price: " .$row["productPrice"]. '$' ?></h4>
				<a href= "productDetail.php?<!?>=<?php echo $row['ID']+255?>" class="li">View</a><br>
				</div>
	<?php
	}
}
else
{
	echo '<h3>Data Not Found</h3>';
}
echo "</div>";
?>