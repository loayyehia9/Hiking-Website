<?php include "menu.php"; ?>

<?php include "dB.php"; ?>
<?php

  $errors = array();
  if (isset($_POST['sub'])){
   if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['pass'])){
	
        //array_push($errors, "Please fill in all requiements!");  
        array_push($errors, "Please Fill All Requirements");
        

       
    }	
    if (count($errors) == 0){
		$result = mysqli_query($conn, "SELECT email , firstName FROM Registration WHERE email = '".$_POST['email']."'");
		$count = mysqli_num_rows($result);
		if ($count > 0){
            
            array_psuh($errors,"Error Data Not Exist");
            $count = 0;
            return false;

        }
		else {
  	$sql = "INSERT INTO Registration (firstName , lastName, email , password, Image ,userType)
		VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '".md5($_POST['pass'])."','', '2')";

        if($conn->query($sql) === TRUE){
           header("refresh: 0.1");
        }
    }
  }
}
?>



<head>
<title>AddAdministrator</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style> 
    <?php include "Styles/addadmin.css" ?>
  </style>

</head>

      

<br>
<form method="POST" action="">
 
<div class="add">
<h4>The Administrators</h4>
<?php
$result = mysqli_query($conn, "SELECT * FROM Registration WHERE userType='2'");

// output data of each row
while($row = mysqli_fetch_array($result)){
  $id = $row['ID'];  
  $fN = $row['firstName'];
  $lN = $row['lastName'];
  $e = $row['email'];
  $p = $row['password'];  
  echo "<br><br>";
  echo "firstName: " .$fN. "<br>"; 
  echo "lastName: " .$lN. "<br>"; 
  echo "Email: " .$e. "<br>"; 
}
?>
  </div>
  <div class="register">
    <h1>Add adminstrator</h1>

<?php include "errors.php" ?>
<hr><label>firstName</label>    
<input type="text" name="firstname" placeholder="Enter Administrator First Name">
<label>lastName</label>
<input type="text" name="lastname" placeholder="Enter Administrator Last Name">
<label>Email</label>
<input type="email" name="email" placeholder="username@example.com">
<label>Password</label>
<input type="password" name="pass"><br><br>
<input type='submit' name='sub' value="Add">  
<input type='reset'>
</div>


</form>
   

