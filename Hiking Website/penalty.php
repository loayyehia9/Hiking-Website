<?php include "dB.php"; 
 include "HR.php";

?>
<style><?php include "Styles/penalty.css" ?></style>
<form method="POST" action="">
  <div class="box">
  <?php
    $result = mysqli_query($conn, "SELECT * FROM hrau WHERE ID='".$_GET['id']."'");
// output data of each row
while($row = mysqli_fetch_array($result)){
  $id = $row['ID'];  
  $ademail = $row['adminemail'];
  $auemail = $row['auditoremail'];
  $message = $row['message'];
  $penalty = $row['penalty'];  
  echo "<br><br>";
  echo "Admin: " . $ademail . "<br><br>";
  echo "Auditor: " . $auemail . "<br><br>";
  echo "Message: " . $message . "<br><br>";
  echo "Penalties so far: " . $penalty . "<br><br>";
}

?>


   <label>Message: </label><input type="text" name="message" readonly value=
   "<?php 
     $result = mysqli_query($conn, "SELECT message FROM hrau WHERE ID='".$_GET["id"]."'");
      if($row = mysqli_fetch_assoc($result)){
      echo $row['message'];
      }
      ?>
      ">
    <br><br>
     <input type="submit" name="addpenalty" value="Add Penalty" class="btnStyle">
  </div>

</form>


<?php
    $res = mysqli_query($conn, "UPDATE hrau SET investigate='investigated' WHERE ID='".$_GET['id']."'");
   
    if(isset($_POST['addpenalty'])){
        $r = mysqli_query($conn, "SELECT penalty FROM hrau WHERE ID='".$_GET['id']."'");
        if($ro = mysqli_fetch_assoc($r)){
           $res = mysqli_query($conn, "UPDATE hrau SET penalty='$ro[penalty]'+1 WHERE ID='".$_GET['id']."'");
        }
        header("refresh: 0.1");
    }



?>