<?php include ('insert.php')?>
<html>
<head>
	<title>Sign Up Form</title>
	
	<style>
		<?php include "Styles/Registration_style.css";?>
	</style>
</head>
<body>
	<div class="signup">
		<img src="Images/avatar.png" class="avatar" id='profileDisplay' onclick='triggerClick()'>
		<h1>Sign up</h1>
		<form method="post" action="">
			<?php include ('errors.php');?>
			<input type='file' name='image' id='profileImage' onchange='displayImage(this)' class='avatar'>
			<label>Firstname</label><br>
			<input type="text" name="firstName" placeholder="FIRSTNAME" id='fN' >
			<label>Lastname</label><br>
			<input type="text" name="lastName" placeholder="LASTNAME" id='lN'>
			<label>Email Address</label><br>
			<input type="Email" name="email" placeholder="username@example.com" id='E'>
			<label>Password</label><br>
			<input type="password" name="pass" placeholder="********" id='P'>
			<label>Confirm Password</label><br>
			<input type="password" name="confirmPass" placeholder="********" id='cP'>
			<p style ="font-size:12px;">Already a member? <a href="login.php">login here</a></p>
			<input type="submit" name="sub" value="Create an account">
			
			
		</form>
	</div>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
   function triggerClick(){
	   document.querySelector('#profileImage').click();
   }
   function displayImage(e){
	   if(e.files[0]){
		   var reader = new FileReader();
		   reader.onload = function(e){
			   document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
		   }
		   reader.readAsDataURL(e.files[0]);
	   }
   }
</script>
	
	
</body>
</html>