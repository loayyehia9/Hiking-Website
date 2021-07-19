<?php

// Create connection
include "dB.php";
$errors = array();
session_start();
if(isset($_POST['Login'])){ //check if form was submitted
    if(empty($_POST['email']) || empty($_POST['password'])){
        array_push($errors, "Please fill in all requiements!");
    }
    if (count($errors) == 0){
      $pass = mysqli_query($conn, "SELECT password FROM Registration WHERE email = '".$_POST['email']."'");
      $result = mysqli_query($conn, "SELECT ID, firstName, userType, email, password FROM Registration WHERE email= '".$_POST['email']."' AND 
      password= '".md5($_POST['password'])."'");
      if (md5($_POST['password']) != $pass){
        array_push($errors, "Password is not valid!");
      }
    if ($result){
          if($row= $result->fetch_assoc()){
		        if($row["userType"] == 1){
                $_SESSION["firstName"] = $row["firstName"];
                $_SESSION["email"] = $row["email"];
                $_SESSION['p'] = $_POST['password'];
                header("Location:HikerHome.php");
            }
	          else if($row["userType"] == 2){
                $_SESSION["firstName"]= $row["firstName"];
                $_SESSION["email"] = $row["email"];
                header("Location:AdminHome.php");
            }
          
            else if($row["userType"] == 3){
		            $_SESSION["firstName"]= $row["firstName"];
                $_SESSION["email"] = $row["email"];
                header("Location:surveyAuditor.php");
            }
            else if($row["userType"] == 4){
                $_SESSION["firstName"]= $row["firstName"];
                $_SESSION["email"] = $row["email"];
                header("Location:HR.php");
            }
        }
     }
  }
}
?>