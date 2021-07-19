<?php include 'checkLogIn.php'?>
<html>
<head>
	<title>Login in</title>
	<style>
		<?php include "Styles/login_style.css"?>
	</style>
</head>
<body>
	<div class="login">
		<img src="Images/avatar.png" class="avatar">
		<h1>Login</h1>
		<form method="POST" action= "login.php">
		<?php include ('errors.php');?>
			<label>Email Address</label><br>
			<input type="email" name="email" placeholder="username@example.com">
			<label>Password</label><br>
			<input type="password" name="password" placeholder="********">
			<input type="submit" name="Login" value="Login">
			<br>
			<a href="Registration.php">Don't have an account?</a>
		</form>
	</div>
		
	
</body> 
</html>