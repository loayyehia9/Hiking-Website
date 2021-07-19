<?php
 try{
 $conn = mysqli_connect("localhost", "root", "", "Hiking");

 }catch(Exception $ex){
     echo "error";
 }
 ?>