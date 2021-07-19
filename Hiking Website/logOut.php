<?php
session_start();
include "dB.php";
mysqli_query($conn, "DELETE FROM user_cart WHERE email='".$_SESSION['email']."'");
session_unset();
session_destroy();
header("Location:login.php");
?>