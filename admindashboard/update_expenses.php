<?php 
session_start();
require '../dataBaseConn.php';


if(isset($_POST['id'])){
      if(isset($_POST['submit'])){
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $qnty = mysqli_real_escape_string($conn, $_POST['qnty']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $total_amount = $qnty * $price;
      
            $query = "UPDATE expenses SET description='$description', qnty='$qnty', price='$price', total_amount='$total_amount' WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);
      
            if($query_run){
                  header("Location: pisowifi.php?message=Update successfully");
            }else{
                  header("Location: pisowifi.php?message=Update Error");
            }
            
      }else{
            echo "Error";
      }
      
     
}else{
      header("Location: ../index.php");
      exit();
}








?>