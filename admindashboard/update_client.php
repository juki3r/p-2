<?php 
session_start();
require '../dataBaseConn.php';


if(isset($_POST['id'])){
      if(isset($_POST['submit'])){
            $id = $name = mysqli_real_escape_string($conn, $_POST['id']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $plan = mysqli_real_escape_string($conn, $_POST['plan']);
            $due_date = mysqli_real_escape_string($conn, $_POST['due_date']);
            $january = mysqli_real_escape_string($conn, $_POST['january']);
            $febuary = mysqli_real_escape_string($conn, $_POST['febuary']);
            $march = mysqli_real_escape_string($conn, $_POST['march']);
            $april = mysqli_real_escape_string($conn, $_POST['april']);
            $may = mysqli_real_escape_string($conn, $_POST['may']);
            $june = mysqli_real_escape_string($conn, $_POST['june']);
            $july = mysqli_real_escape_string($conn, $_POST['july']);
            $august = mysqli_real_escape_string($conn, $_POST['august']);
            $september = mysqli_real_escape_string($conn, $_POST['september']);
            $october = mysqli_real_escape_string($conn, $_POST['october']);
            $november = mysqli_real_escape_string($conn, $_POST['november']);
            $december = mysqli_real_escape_string($conn, $_POST['december']);
      
            $query = "UPDATE clients SET name='$name', plan='$plan', due_date='$due_date', january='$january', febuary='$febuary', march='$march', april='$april', may='$may', june='$june', july='$july', august='$august', september='$september', october='$october', november='$november', december='$december'  WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);
      
            if($query_run){
                  header("Location: view.php?message=Update successfully");
            }else{
                  header("Location: view.php?message=Update Error");
            }
            
      }else{
            echo "Error";
      }
      
     
}else{
      header("Location: ../index.php");
      exit();
}








?>