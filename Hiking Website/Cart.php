<title>Cart</title>
<?php include "dB.php";
   include "HikerHome.php" ?>

 
   <html>
    <style>
   <?php include "Styles/Cart.css" ?>
 </style>
   <body>
   

  <div class="wrapper">
     <div class="main_container">
        <div class="item">

   
           
    <div class="container">
           
    <div class="main">
    <form method="post" action="">
    <div class="products">
        <h1>Cart</h1>
        <?php
        $sql = mysqli_query($conn, "SELECT email FROM user_cart WHERE email='".$_SESSION['email']."'");
        if(!$row = mysqli_fetch_assoc($sql)){
            echo "<h2>Nothing has been put in yet</h2>";
          }

        $product2 = mysqli_query($conn,"SELECT product_id, productPrice FROM user_cart WHERE email='".$_SESSION['email']."'");
        while($rows = mysqli_fetch_array($product2)){
            $product = mysqli_query($conn,"SELECT productName , productImg from products WHERE ID ='$rows[product_id]' ");
        while($row =mysqli_fetch_array($product)){
?>
    <img src="Images/<?php echo $row['productImg'] ?>"alt="" name="image"><br>
    <h4>Product Name: <?php echo $row['productName']?><br>
    Price: <?php echo $rows['productPrice']?>$<br>
    <span class="fas fa-trash-alt"><input type="submit" name="remove" class= "trash" id = "trs" onchange="change()" value="<?php echo $rows['product_id']+255 ?>"></span></h4>
             <?php
                }
                echo "<br>"; 
            }
          ?>
         <br>

         
    </div>

        <div class="checkout">
            <ul>
                <li class="subtotal">subtotal
                    <span name="total">
                    <?php
                        $sql = mysqli_query($conn, "SELECT productPrice FROM user_cart WHERE email='".$_SESSION['email']."'");
                        $sum = 0;
                        while($row=mysqli_fetch_array($sql)){
                             $sum += $row['productPrice'];   
                        }
                        echo $sum .'$';
                    ?>
                    </span>
                    
                </li>
                <li class="subtotal">taxes<input type="text" class="total" name ="total" value="
                  <?php 

                  $taxdisplay = mysqli_query($conn, "SELECT Taxes FROM Members WHERE email='".$_SESSION['email']."'");
                  $taxes = 0;
                        while($row = mysqli_fetch_array($taxdisplay)){
                            $taxes += $row['Taxes'];
                        }
                        echo $taxes;

                  ?>" readonly>
                    
                  </li>
                <li class="cart-total">Total
                <input type="text" name ="check" class="total" value="
                <?php

                        $sql = mysqli_query($conn, "SELECT productPrice FROM user_cart WHERE email='".$_SESSION['email']."'");
                        $sum = 0;
                        while($row=mysqli_fetch_array($sql)){
                             $sum += $row['productPrice'];   
                        }
                        $taxes = mysqli_query($conn, "SELECT Taxes FROM Members WHERE email='".$_SESSION['email']."'");
                        $tax = 0;
                        while($row = mysqli_fetch_array($taxes)){
                            $tax += $row['Taxes'];
                        }
                        echo $sum * ($tax/100) + $sum;
                    ?>
                
                "readonly></li>
            </ul>
            <input class="proceed-btn" type="submit" name="checkout" value="Proceed to Checkout">
        </div>
</div>
</div>
</div>
</div>
</div>


</form>
 </body>
<script>
    function change(){
        document.getElementById('trs').style.display = 'hidden';
    }
</script>

   </html>

<?php
    if(isset($_POST['checkout'])){
        $res = mysqli_query($conn, "SELECT product_id FROM user_cart WHERE email='".$_SESSION['email']."'");
        $val=array();
          while($row=mysqli_fetch_array($res)){
            array_push($val, (int)$row['product_id']);
          }
            $d = implode("," , $val); 
          
        mysqli_query($conn, "INSERT INTO checkout (totalAmount, email, product_id) VALUES
        ('$_POST[check]','$_SESSION[email]' , '$d')");

        mysqli_query($conn,"DELETE FROM user_cart WHERE email = '".$_SESSION['email']."'");
        header("refresh:0.1");
}


    if(isset($_POST['remove'])){
        mysqli_query($conn,"DELETE FROM user_cart WHERE product_id = '".$_POST['remove']."'-255");
        header("refresh:0.1");
    }

    
    


?>