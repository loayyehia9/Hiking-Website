<?php
include "HikerHome.php";
include "dB.php";
?>

<style>
     <?php include "Styles/editProfile.css"; ?>
</style>
<div class="wrapper">
<div class="main_container">

<div class="cont">
<?php  
      $ressult = mysqli_query($conn, "SELECT Image FROM Registration WHERE email='".$_SESSION['email']."'");
      if($row = mysqli_fetch_assoc($ressult)){
        if($row['Image'] == ''){
      ?>
           <img src="Images/avatar.png" class="i" id="imag" onclick="triggerClick()" name="imag">
    <?php
    } 
       if($row['Image'] != ''){
    ?>
       <img src="Images/<?php echo $row['Image'] ?>" class="i" id="imag" onclick="triggerClick()" name="imag">
    
<?php
}}    
?>
<form method="POST" action="">
<?php
   $result = mysqli_query($conn, "SELECT * FROM Registration WHERE email='".$_SESSION['email']."'");
   if($row = mysqli_fetch_array($result)){
?>
<input type='file' name='newImage' id='newImage' onchange='displayImage(this)' class='i'>

<input type="text" name="firstName" class="fN" onClick='this.setSelectionRange(0, this.value.length)' value='<?php 
    echo $row['firstName'];
    ?>'>
    <br><br>
    <input type="text" name="lastName" class="lN" onClick='this.setSelectionRange(0, this.value.length)' value='<?php 
    echo $row['lastName'];
    ?>'>
<br><br>
<input type="email" name="email"  class="e" onClick='this.setSelectionRange(0, this.value.length)' value='<?php 
    echo $row['email'];
    ?>' >
<br><br>
<input type="password" name="pass" class="p"  onClick='this.setSelectionRange(0, this.value.length)' value='<?php 
    $ressult = mysqli_query($conn, "SELECT password FROM Registration WHERE email='".$_SESSION['email']."'");
    if($row = mysqli_fetch_array($ressult))
    echo $_SESSION['p'];
    ?>
'>
<?php }?>
<br><br>
<input type="submit" value="Update" name="sub" class="b">
</form>
</div>
</div>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
   function triggerClick(){
	   document.querySelector('#newImage').click();
   }
   function displayImage(e){
	   if(e.files[0]){
		   var reader = new FileReader();
		   reader.onload = function(e){
			   document.querySelector('#imag').setAttribute('src', e.target.result);
		   }
		   reader.readAsDataURL(e.files[0]);
	   }
   }
</script>




<?php
  if(isset($_POST['sub'])){
    
      $result = mysqli_query($conn, "SELECT * FROM Registration WHERE email='".$_SESSION['email']."'");
      if($row = mysqli_fetch_assoc($result)){
        if($row['firstName'] != $_POST['firstName']){
            $result = mysqli_query($conn, "UPDATE Registration SET firstName='".$_POST['firstName']."' WHERE email='".$_SESSION['email']."'");
        }
        if($row['lastName'] != $_POST['lastName']){
            $result = mysqli_query($conn, "UPDATE Registration SET lastName='".$_POST['lastName']."' WHERE email='".$_SESSION['email']."'");
         }
         if($row['email'] != $_POST['email']){
            $result = mysqli_query($conn, "UPDATE Registration SET email='".$_POST['email']."' WHERE email='".$_SESSION['email']."'");
         }
         
         if($row['password'] != md5($_POST['pass'])){
            $result = mysqli_query($conn, "UPDATE Registration SET password='".md5($_POST['pass'])."' WHERE email='".$_SESSION['email']."'");
         }
         if(!empty($_POST['imag'])){
            $result = mysqli_query($conn, "UPDATE Registration SET Image='".$_POST['imag']."' WHERE email='".$_SESSION['email']."'");
        }
        if(!empty($_POST['newImage'])){
            $result = mysqli_query($conn, "UPDATE Registration SET Image='".$_POST['newImage']."' WHERE email='".$_SESSION['email']."'");
          }
       }
       $_SESSION['firstName'] = $_POST['firstName'];
       $_SESSION['email'] = $_POST['email'];
       $_SESSION['p'] = $_POST['pass'];
           
       header("refresh: 0.1"); 
    }
?>

