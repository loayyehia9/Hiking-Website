<?php  session_start(); ?>
<script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<style>
   <?php include "Styles/HikerHomeStyle.css";?>
  </style>
<title>Home</title>
<?php ob_start();?>

<script type="text/javascript">
  $(document).ready(function(){
$(".hamburger").click(function(){
   $(".wrapper").toggleClass("collapse");

  });
});

function Next(){
  window.location.href="editProfile.php";
}
</script>

<div class="wrapper">
  
  <div class="top_navbar">
    <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div>
    <div class="top_menu">
      <div class="logo">
         Hiking Peak
      </div>
      <div class="session">
      <?php 
      include "dB.php";
      ob_start();
      $ressult = mysqli_query($conn, "SELECT Image FROM Registration WHERE email='".$_SESSION['email']."'");
      if($row = mysqli_fetch_assoc($ressult)){
        if($row['Image'] == ''){
          echo "<img src='Images/avatar.png' class='phot'' onclick='Next()'>";
        }
        else{
        echo "<img src='Images/".$row['Image']."' class='phot'' onclick='Next()'>";
        }
      }
      echo "Welcome " .$_SESSION['firstName'];
      ?>
    </div>
    </div>
    </div>
  
  <div class="sidebar">
      <ul>
        <li><a href="HikerHome.php">
          <span class="icon"><i class="fas fa-home"></i></span>
          <span class="title">Home & Gallery</span>
          </a></li>
        <li><a href="ViewGroups.php">
          <span class="icon"><i class="fas fa-users"></i></span>
          <span class="title">Groups</span>
          </a></li>

          <li><a href="leaveGroups.php">
          <span class="icon"><i class="fas fa-users"></i></span>
          <span class="title">My Groups</span>
          </a></li>

        <li><a href="searchProduct.php">
          <span class="icon"><i class="fab fa-shopify"></i></span>
          <span class="title">Products</span>
          </a></li>
          
          <li><a href="Cart.php">
          <span class="icon"><i class="fas fa-cart-plus"></i></span>
          <span class="title">Cart</span>
          </a></li>
          
          <li><a href="readMessagesHiker.php">
          <span class="icon"><i class="fas fa-reply"></i></span>
          <span class="title">Messages 
            <?php
                $i=0;
                $result = mysqli_query($conn, "SELECT Message FROM chat WHERE Receiver='".$_SESSION['email']."' AND Status='Delivered'");
                while(mysqli_fetch_array($result)){
                  $i++;
                }
                echo '<p class="me">&nbsp' .$i. '</p>';
            ?>
          </span>
          </a></li>
          <li><a href="contuctus.php">
          <span class="icon"><i class="fas fa-hiking"></i></span>
          <span class="title">Suggest a Group</span>
          </a></li>


          <li><a href="surveyHiker.php">
          <span class="icon"><i class="fas fa-align-left"></i></span>
          <span class="title">Survey</span>
          </a></li>

          <li><a href="sendMessage.php">
          <span class="icon"><i class="fas fa-address-book"></i></span>
          <span class="title">Contact Us</span>
          </a></li>
        <li><a href="logOut.php">
          <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
          <span class="title">LogOut</span>
          </a></li>
    </ul>
  </div>
  
  <div class="main_container">
    <!-- 
      please be aware
    for content in page
    -->
    <!--
    <div class="item">
      
    </div>
    <div class="item">
    </div>
-->
  </div>
</div>