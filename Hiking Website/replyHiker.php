<div class="wrapper">
<?php include "dB.php"; 
 include "HikerHome.php";

?>

<style>
   <?php  include "Styles/reply.css";?>
  </style>
<form method="POST" action="">
  <div class="box">
    <br><div class="wra">
      <h1>sendmessage</h1>
      <br><br><br>
<div class="rec">
  <?php

$result = mysqli_query($conn, "SELECT * FROM chat WHERE Receiver='".$_GET['<!?>']."'");


// output data of each row
while($row = mysqli_fetch_array($result)){
  $id = $row['ID'];
  $sender = $row['Sender'];  
  $message = $row['Message'];
   echo $message. "<br>"; 

    
}

?>
</div>
<div class="sen">

  <?php

$result = mysqli_query($conn, "SELECT * FROM chat WHERE Sender='".$_GET['<!?>']."'");


// output data of each row
while($row = mysqli_fetch_array($result)){
  $id = $row['ID'];
  $sender = $row['Sender'];  
  $message = $row['Message'];
  echo $message. "<br>"; 
    
  
}

?>
</div>
<br>
<div class="from">
<h4>From:
   <input type="text" name="S" readonly value=
   "<?php 
     $result = mysqli_query($conn, "SELECT email FROM Registration WHERE email='".$_SESSION["email"]."'");
      if($row = mysqli_fetch_array($result)){
      echo $row['email'];
      }
      ?>
      ">
    </h4>
    </div>
    <br><br>
    <div class="to">
   <h4>To:
   <input type="text" name="R" readonly value="<?php 
      $result = mysqli_query($conn, "SELECT Sender FROM chat WHERE Sender='".$_GET['<!?>']."'");
      if($row = mysqli_fetch_array($result)){
      echo $row['Sender'];
    }
    ?>
    ">
   </h4>
 </div>
    <textarea placeholder="Type Message Here" name="M"></textarea><br><br><br>
    <input type="submit" name="sub" value="Send Message">
  </div>
  </div>
  </div>
</form>


<?php
    $res = mysqli_query($conn, "UPDATE chat SET Status='Read' WHERE Sender='".$_GET['<!?>']."' AND Receiver='".$_SESSION['email']."'");
   if(isset($_POST['sub'])){
      if(empty($_POST['M'])){
         echo "ERROR U Don't Enter Message";
         return;
      }
      else {
         $result = mysqli_query($conn, "INSERT INTO chat(Sender , Receiver, Message, Status)
         VALUES ('$_POST[S]', '$_POST[R]', '$_POST[M]', 'Delivered')");
         
         if($result){
            echo "Done";
            header("refresh: 0.1");
            }
       }
   }

?>