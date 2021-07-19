<!DOCTYPE html>
<html>
	<head>
		<title>HR</title> 
    
		
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">		
  	
	</head>
	<style>
		<?php include "Styles/hr.css"?>
	</style>
	<body>	

	<input type ="checkbox"id="check">
		<header>
			<label for ="check">
				<i class="fas fa-bars" id="sidebar_btn"></i>
            </label>
			<div class="left_area">
				<h3>HR </h3>
		    </div>
			<div class ="right_area">
				<a href="logOut.php" class="logout_btn">logout</a>
		</div>
		</header>

		<div class="sidebar">
			<center>
				<img src ="Images/doba.jpg" class ="profile_image" alt ="">
				<?php
				
                    include "dB.php";
                    ob_start();
                    session_start();
				    echo "Welcome ".$_SESSION['firstName'];
                 
					
			
				?>
		    </center>
		    <a href="HR.php"><i class="fas fa-desktop"></i> <span>home</span></a>
			<a href="adminWarning.php"><i class="fas fa-desktop"></i> <span>adminwarning</span></a>
			
		</div>
		<div class="content"></div>
			
		</div>
		
			</div>
	</body>
</html>
