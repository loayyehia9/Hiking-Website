<style>
   <?php include "Styles/searchg.css" ?>
	</style>

<?php
include "dB.php";
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT * FROM groups 
	WHERE groupName LIKE '%".$search."%' ||
		groupLocation LIKE '%".$search."%'";
}
else{
	$query = "SELECT * FROM groups ORDER BY groupId ASC";
}
echo "<div class='register'>";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_array($result))
	{
		?>
		<img src="Images/<?php echo $row['groupImage']?>">
		<div class="comp">
		<h4><?php echo "group Name: " .$row["groupName"] ?> </h4>
        <h4><?php echo "group Location: " .$row["groupLocation"]?></h4>
		<h4><?php echo "group Description: " .$row["groupDescription"] ?></h4>
        <h4><?php echo "group Difficulty: " .$row["groupDifficulty"] ?></h4>
        <h4><?php echo "group Distance: " .$row["groupDistance"] ?></h4>
        <h4><?php echo "group Duration: " .$row["groupDuration"] ?></h4>
    
      <a href= "groupdetails.php?<!?>=<?php echo $row['groupId']+255?>" class="li">View</a><br>
  
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