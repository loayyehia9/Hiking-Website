<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <style>
<?php include "Styles/AdminHome.css"; ?>
</style>
</head>

<body> 
<div class="content">	
 <div id="mainbox" onclick="openFunction()"><div class="session">&#9776;
 					<?php 	
					 include "dB.php";
					 ob_start();
			        session_start();
					echo "Welcome ".$_SESSION["firstName"];
					?>
					</div>
					</div>
  <div id="menu" class="sidemenu">
  				<a href="AdminHome.php">Home</a>
				<a href="UpdateGroup.php">Groups</a>
				<a href="UpdateProduct.php">Products</a>
				<a href='Administrator.php'>Administrator</a>
				<a href="readMessages.php">Messages 
				<?php
                $i=0;
                $result = mysqli_query($conn, "SELECT Message FROM chat WHERE Receiver='".$_SESSION['email']."' AND Status='Delivered'");
                while(mysqli_fetch_array($result)){
                  $i++;
                }
                echo '<p>&nbsp' .$i. '</p>';
            ?>
				</a>
				<a href="viewHikers.php">view Hikers</a>
				<a href="viewsuggest.php">view suggest</a>
				<a href="searchcheckout.php">order Details</a>
				<a href='logOut.php'>LogOut</a>	
			</nav>
   <a href="#" class="closebtn" onclick="closeFunction()">&times;</a>
 </div>
</div>
<script type="text/javascript">
 function openFunction(){
  document.getElementById("menu").style.width="300px";
  document.getElementById("mainbox").style.marginLeft="300px";
 }
function closeFunction(){
 document.getElementById("menu").style.width="0px";
 document.getElementById("mainbox").style.marginLeft="0px";

}
</script>

</body>
</html>