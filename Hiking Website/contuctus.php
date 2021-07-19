<?php

include "dB.php";
 include "HikerHome.php";
 include "errors.php"


 
?>
<html>
  <title> suggestGroup </title>
  <style>
        <?php include "Styles/contuctus.css";?>
    </style>

  <body>  
  <div class="wrapper">
  <div class="main_container">
  <div class="item">
    <div class="register">
        
        <br><br>
   <form method = "post" action="">
   
     <label> suggestion </label> <br> <textarea type = "text" name = "suggestion" class = "txtStyle" value = "<?php print $suggestion; ?>"> </textarea>
     <br> <br>
   
     
     
     <label> image </label> <br> <input type = "file" name = "image" class = "txtStyle" value = "<?php print $image; ?>"> <br> <br>
     
    
     <input type = "submit" name = "insert" value = "suggest" class = "btnStyle" >
   </form>
      
 </div>

 </div>
 </div>
 </div>

</body>
</html>


<?php
// insert
$errors = array();
 if(isset($_POST['insert'])){
  if($_POST['suggestion'] == '' && $_POST['image'] == ''){
    echo '<script>alert("Error, Fill All Data")</script>';
    return;
  }
   
  if(empty($_POST['suggestion']) || empty($_POST['image']){
    echo '<script>alert("Error, Fill The Text")</script>';
    return;
 }
 if($_POST['image'] == ''){
  echo '<script>alert("Error, Please Insert an Image")</script>';
  return;
 }

 else{
    mysqli_query($conn, "INSERT INTO contuct(email, suggestion, image) VALUES ('$_SESSION[email]', '$_POST[suggestion]', '$_POST[image]')");
    echo '<script>alert("Done, Data Inserted Sucessfully")</script>';
    header("refresh: 0.1");
    return;
    
  }
}
?>