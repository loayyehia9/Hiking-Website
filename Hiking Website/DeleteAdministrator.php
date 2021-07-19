<?php include ('menu.php')?>
<!DOCTYPE html>
<html>
<head>
  <title>Delete Administrator</title>
  <style>
        <?php include "Styles/DeleteAdministrator.css";?>
    </style>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
</head>
<body>
  <form action='' method='POST'>  
  <?php include "dB.php"; ?>
  <div class="register">
    <h1>Administrator Delation</h1>
  
   <p style="visibility:hidden;"><b>ID</b></p>
  <?php
  $result = mysqli_query($conn, "SELECT * FROM Registration WHERE userType='2'");

      // output data of each row
      while($row = mysqli_fetch_array($result)){
        $id = $row['ID'];  
        $fN = $row['firstName'];
        $lN = $row['lastName'];
        $e = $row['email'];
        $p = $row['password'];  
        ?>
       
        <br><br>
        <p style="visibility:hidden;"><?= $id ?></p>
       <?php
        echo "firstName: " .$fN. "<br>"; 
         echo "lastName: " .$lN. "<br>"; 
         echo "Email: " .$e. "<br>"; 
         ?>
        
        Select Administrator: <input type='checkbox' name='delete[]' value='<?= $id ?>' >
  
  
     <?php
   }
  ?>    

<div class ="r">
<br><br><input type= 'submit' name='sub' value="Delete">
</div>
  </div>
</form>
</body>
</html>
<?php
  if(isset($_POST['sub'])){
    if(isset($_POST['delete'])){
      foreach($_POST['delete'] as $dele){
        mysqli_query($conn, "DELETE FROM Registration WHERE ID = '" .$dele. "'");
     }
   }  
      else{
         echo "ERROR U SHOULD SELECT USER TO DELETE IT";
        }
        header("refresh: 0.1");  
  }  
?>

