<?php include "AdminHome.php";
      include "dB.php";
?>
<style> <?php include "Styles/viewOrder.css"; ?> </style>
  <div class="viewOrder">
<?php
  $sql = mysqli_query($conn, "SELECT product_id, totalAmount FROM checkout WHERE ID='".$_GET['<>']."'-255");
  $val = array();
  $totalAmount;
   if($row=mysqli_fetch_assoc($sql)){
       $val = explode(",", $row['product_id']);
       $totalAmount = $row['totalAmount']; 
?>
  <h2 class="oN">orderNumber: <?php echo $_GET['<>']-255 ?></h2>    
    <?php
}
 
    foreach ($val as $v){
    $result = mysqli_query($conn, "SELECT * FROM products WHERE ID='".$v."'");
    while($row = mysqli_fetch_array($result)){
        ?>
     <img src="Images/<?php echo $row['productImg'] ?>">
     <h4>ProductName: <?php echo $row['productName']."<br>" ?></h4>
     <h4>ProductPrice: <?php echo $row['productPrice']."$<br>" ?></h4>

  <?php
    }
}
?>
 <h4 class="oN">totalAmount: <?php echo $totalAmount ."$<br>" ?></h4>
    
</div>
