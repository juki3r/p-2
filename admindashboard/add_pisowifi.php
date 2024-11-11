<?php 
session_start();
// If Session id and name are present proceed to dashboard
if(isset($_SESSION['id'])){   
    include '../dataBaseConn.php';
    ?>

    <?php
    if(isset($_POST['submit'])){
        $vendo_name = $_POST['vendo_name'];
        $sql = mysqli_query($conn, "SELECT * from clients WHERE vendo_name = '$vendo_name'");
        if (mysqli_num_rows($sql) > 0) {
            echo "<script>alert('Vendo already exists !')</script>";
        }else{
            $sql = "INSERT INTO clients (vendo_name) VALUES('$vendo_name')";
            $query = mysqli_query($conn, $sql);
            if($query){
                echo "<script>alert('Data added !')</script>";
            }else{
                echo "<script>alert('Please try again !')</script>";
            }
        }
    }
    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="shortcut icon" href="../assets/images/logo.jpg" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <?php include  '../header.php'; ?>

        <div class="container-fluid">
            <div class="container">
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 col-lg-4 col-md-6 border p-3">
                        <h3 class="text-center">Add Vendo</h3>
                        <form action="index.php" method="POST">
                            <input type="text" name="vendo_name" class="form-control my-2 text-capitalize" placeholder="Name" required>
                           
                            <input type="submit" name="submit" class="form-control bg-primary text-light" value="Submit">
                        </form>
                    </div>
                </div>     
            </div>
        </div>
        
        


    </body>
    </html>

    <?php
// If Session id and name are not present, go back to login page
}else{ 
    header("Location: ../index.php");
    exit();
}


?>