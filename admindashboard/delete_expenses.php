<?php 
session_start();
require '../dataBaseConn.php';
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "DELETE FROM expenses WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        header("Location: expenses.php?message=Delete successfully");
    }else{
            header("Location: expenses.php?message=Delete Error");
    }
  
}else{
      header("Location: ../index.php");
      exit();
}