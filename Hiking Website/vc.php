<?php include "dB.php"; 
 include "Auditor.php";

?>
<style>
   <?php  include "Styles/vc.css";?>
  </style>


<form method="POST" action="">
  <div class="box">
    <br><div class="wra">
      <h1>the messages between the admin & the hiker</h1>
      <h2>add comment</h2>
      
      <br><br><br>
<div class="sen">
  <?php

$result = mysqli_query($conn, "SELECT Message FROM chat where Receiver='".$_GET['!?']."'");


// output data of each row
while($row = mysqli_fetch_array($result)){
  $message = $row['Message'];
    echo $message. "<br>"; 
    ?>

    <input type='checkbox' name='m[]' value='<?php echo $row['Message'] ?>'>
<?php
}
?>

</div>
<div class="rec">
  <?php

$result = mysqli_query($conn, "SELECT Message FROM chat where Sender='".$_GET['!?']."'");


// output data of each row
while($row = mysqli_fetch_array($result)){
  $message = $row['Message'];
  echo $message. "<br>"; 
 
    
}

?>
</div>

<div class="from">
<h4>From:
   <input type="text" name="S" readonly value=
   "<?php 
     $result = mysqli_query($conn, "SELECT Sender FROM chat WHERE Receiver ='".$_GET['!?']."'");
      if($row = mysqli_fetch_array($result)){
      echo $row['Sender'];
      }
      ?>
      ">
      
    </h4>
      </div>
    <br><br>
    <div class="to">
   <h4>To:
   <input type="text" name="R" readonly value="<?php 
      $result = mysqli_query($conn,"SELECT Sender FROM chat WHERE Sender ='".$_GET['!?']."'" );
      if($row = mysqli_fetch_array($result)){
      echo $row['Sender'];
    }
    ?>
    ">
  </h4>

  <input type= 'submit'  name='sub' value="addcomment">

<textarea placeholder="Type comment Here" name="am"></textarea>
<div class="r">
 <input type= 'submit'  name='in' value="investigate">
</div>

  </div>
  </div>
</div>
</form>


<?php

  if(isset($_POST['sub'])){
    if(isset($_POST['m'])){
    echo "<h1>$message</h1>"; 
      foreach($_POST['m'] as $me){
          $sql = mysqli_query($conn, "INSERT INTO auditor (adminemail, message, addcomment) VALUES ('$_POST[S]', '$me', '$_POST[am]')");
          echo '<script>alert("Done")</script>';
          return;
        }
}
      else{
         echo "ERROR U SHOULD SELECT USER TO  IT";
        }
        header("refresh: 0.1");  
  
}
  
?>
<?php

  if(isset($_POST['in'])){
    if(isset($_POST['m'])){
    echo "<h1>$message</h1>"; 
      foreach($_POST['m'] as $me){
          $sql = mysqli_query($conn, "INSERT INTO hrau (adminemail, auditoremail, message,investigate, penalty) VALUES ('$_POST[S]', '$_SESSION[email]', '$me','pending investagation','0')");
          echo '<script>alert("Done")</script>';
          return;
        }
}
      else{
         echo "ERROR U SHOULD SELECT USER TO  IT";
        }
        header("refresh: 0.1");  
  
}
  
?>