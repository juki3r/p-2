<?php 
session_start();
include '../dataBaseConn.php';
$id = $_SESSION['id'];
mysqli_query($conn, "UPDATE user SET login='no' WHERE id='$id'");
session_unset();
session_destroy();
header("Location: ../index.php");
?>