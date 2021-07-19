
<!DOCTYPE html>
<html>
<head>
  <title>Document Title</title>
  <style>
<?php include "Styles/menus.css"; ?>
</style>
</head>

<body> 
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
				<a href='AddAdministrator.php'>Add</a>	
			  	<a href='DeleteAdministrator.php'>Delete</a>
			  	<a href='logOut.php'>LogOut</a>	
			</nav>
   <a href="#" class="closebtn" onclick="closeFunction()">&times;</a>
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

