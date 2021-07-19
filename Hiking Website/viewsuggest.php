<?php
include "menugroup.php";
?>

<style>
  <?php include "Styles/vs.css" ?>
</style>
<?php
include "dB.php";
 
    
  $sql= "SELECT * FROM contuct";
  $result = mysqli_query($conn, $sql);
  echo "<div class='register'>";
    echo "<h1>view suggestion</h1>";
  echo "<br><br><br><br><br><br>";
  while($row = mysqli_fetch_array($result)){
     echo "<div class='row'>";
      echo "<div class='col'>";
     //echo "<div class='product'>";
         echo "<img src='Images/".$row['image']."''>";
          echo "<br>";
  
 echo "<div class='over'>";
 
      
  echo"</div>";
echo"</div>";
echo "<div class='rate'>";
       
       
    echo "<h5>" ."email: " .$row['email']. "</h5>";
    echo "<h5>" ."suggestion: " .$row['suggestion']. "</h5>";
    

    echo " </div>";
    echo "</div>";
}

?>