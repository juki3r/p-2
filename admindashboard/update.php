<?php 
session_start();
require '../dataBaseConn.php';
if(isset($_GET['id'])){
      if(isset($_POST['update_client'])){
            $id = $name = mysqli_real_escape_string($conn, $_POST['id']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $plan = mysqli_real_escape_string($conn, $_POST['plan']);
            $due_date = mysqli_real_escape_string($conn, $_POST['due_date']);
            $july = mysqli_real_escape_string($conn, $_POST['july']);
            $august = mysqli_real_escape_string($conn, $_POST['august']);
            $september = mysqli_real_escape_string($conn, $_POST['september']);
            $october = mysqli_real_escape_string($conn, $_POST['october']);
      
            $query = "UPDATE clients SET name='$name', plan='$plan', due_date='$due_date', july='$july', august='$august', september='$september', october='$october' WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);
      
            if($query_run){
                  header("Location: view.php?message=Update successfully");
            }else{
                  header("Location: view.php?message=Update Error");
            }
      }
     
}else{
      header("Location: ../index.php");
      exit();
}








?>