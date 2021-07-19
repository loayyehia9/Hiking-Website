<div class="wrapper">
<?php include "dB.php"; 
 include "HikerHome.php";
?>

<style>
    <?php include "Styles/message.css";?>
  </style>
<div class="main_container">
<div class="item"> 

<form method="POST" action="">
<div class="box">  
<h1>send Message</h1>

<br><div class="wra">


<h4>From:
   <input type="text" name="S" readonly value="<?php 
     $result = mysqli_query($conn, "SELECT email FROM Registration WHERE email='".$_SESSION["email"]."'");
      if($row = mysqli_fetch_array($result)){
      echo $row['email'];
      }
      ?>
      ">
      </h4>
      <div class="sen">
  <?php
$result = mysqli_query($conn, "SELECT * FROM chat WHERE Sender='".$_SESSION['email']."'");
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
   <h4>From:
   <input type="text" name="R" readonly value="<?php 
      $result = mysqli_query($conn, "SELECT email FROM Registration WHERE ID='".$_GET['!?']."'-255");
      if($row = mysqli_fetch_array($result)){
      echo $row['email'];
    }
    ?>
    ">
    </h4>
  <div class="rec">
  <?php
    $result = mysqli_query($conn, "SELECT * FROM chat WHERE Receiver='".$_SESSION['email']."'");
 // output data of each row
while($row = mysqli_fetch_array($result)){
  $id = $row['ID'];
  $sender = $row['Sender'];  
  $message = $row['Message'];
  echo $message. "<br>";
}
 ?>


  </div>





    <textarea placeholder="Type Message Here" name="M"></textarea><br><br><br>
    <input type="submit" name="sub" value="Send Message">
    </div>  
    </div>
    </div>
  </div>
  </div>
  </form>


<?php
   if(isset($_POST['sub'])){
      if(empty($_POST['M'])){
         echo "ERROR U Don't Enter Message";
         return;
      }
      else {
         $result = mysqli_query($conn, "INSERT INTO chat(Sender , Receiver, Message, Status)
         VALUES ('$_POST[S]', '$_POST[R]', '$_POST[M]', 'Delivered')");
         
         if($result){
            header("refresh: 0.1");
            }
       }
   }
?>


  