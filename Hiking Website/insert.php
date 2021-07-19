<?php
	include "dB.php";
    $errors = array();

//if the sumbit button is clicked
if (isset($_POST['sub'])){

    //if the user form fields are empty...
	if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || 
	    empty($_POST['pass']) || empty($_POST['confirmPass'])){
		array_push($errors, "Please fill in all requiements!");  
	}

	
	if ($_POST['pass'] != $_POST['confirmPass']){
		array_push($errors, "The two passwords must match first");
	}
	

	// if there are no errors save the new user to the db

	if (count($errors) == 0){
	
		$result = mysqli_query($conn, "SELECT email FROM Registration WHERE email = '".$_POST['email']."'");
		$count = mysqli_num_rows($result);
		if ($count > 0){
			array_push($errors,"Email already taken!");
			$count = 0;
			return false;
		}
		else {
		$sql = "INSERT INTO Registration (firstName , lastName, email , password, Image, userType)
		VALUES ('$_POST[firstName]', '$_POST[lastName]', '$_POST[email]', '".md5($_POST['pass'])."', '$_POST[image]', '1')";

        if($conn->query($sql) === TRUE){
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in!";
            header ('location: login.php');  //redirect
        }
    }
}

	if (isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['email']);
		header('location: login.php');
	}
}



?>