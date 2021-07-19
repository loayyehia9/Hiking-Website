<style>
   <?php include "Styles/checkcheck.css" ?>
	</style>

<?php
include "dB.php";
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "
	SELECT * FROM checkout 
	WHERE ID LIKE '%".$search."%' ||
        product_id LIKE '%".$search."%' ||
		email LIKE '%".$search."%'||
		totalAmount LIKE '%".$search."%'";
}
else
{
	$query = "
	SELECT * FROM checkout ORDER BY ID ASC";
}
echo "<div class='register'>";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	?>
			<div class="table-responsive">
			<table class="table table bordered">
				<tr>
					 <th>email</th>
					 <th>totalAmount</th>
					<th>Orders</th>
				</tr>
				<?php
	while($row = mysqli_fetch_array($result))
	{
	?>
			<tr>
				<td><?php echo $row["email"] ?></td>
				<td><?php echo $row["totalAmount"]. "$"?></td>
				<td><a href="viewOrder.php?<>=<?php echo $row['ID']+255 ?>">viewOrder</a></td>
			</tr>
			<?php
	}
}

else
{
	echo '<h3>Data Not Found</h3>';
}
echo "</div>";
?>