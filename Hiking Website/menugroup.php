<!DOCTYPE html>
<html>
<head>
  <title>Document Title</title>
<style>
<?php include "Styles/menus.css"; ?>
</style>

</head>

<body> 
 <div id="mainbox" onclick="openFunction()">&#9776;<?php 	
					 include "dB.php";
					 ob_start();
			        session_start();
					echo "Welcome ".$_SESSION["firstName"];
					?></div>
  <div id="menu" class="sidemenu">
  
              <a href='AdminHome.php'>Home</a>
			  <a href='AddGroup.php'>Add</a>
			  <a href='addmembergroup.php'>Add Members<br> &nbsp To Groups</a>
			  <a href='removeMember.php'>Remove Members<br> &nbsp From Groups</a>
			  <a href='DeleteGroup.php'>Delete</a>	
			  <a href='UpdateGroup.php'>Edit</a>
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
