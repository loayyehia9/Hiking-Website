<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <style>
<?php include "Styles/menuChatHike.css"; ?>
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
  				<a href="Auditor.php">Home</a>
  				<a href="auditoradmin.php">admins</a>
				  <a href="surveyAuditor.php">Add Survey</a>
				  <a href="displaySurvey.php">Results</a>
				  
				  
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