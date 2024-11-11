<?php 
session_start();
// If Session id and name are present proceed to dashboard
if(isset($_SESSION['id'])){   
    include '../dataBaseConn.php';
    ?>

    <?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $plan = 'Plan' . ' ' .$_POST['plan'];
        $due_date = $_POST['due_date'];

        $sql = mysqli_query($conn, "SELECT * from clients WHERE name = '$name'");
        if (mysqli_num_rows($sql) > 0) {
            echo "<script>alert('Name already exists !')</script>";
        }else{
            $sql = "INSERT INTO clients (name, plan, due_date) VALUES('$name', '$plan', '$due_date')";
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
        <style>
            #logo{
                width: 150px;
                height: 100px;
            }
            
        </style>
    </head>
    <body>
        <div class="container-fluid">

           
                <!-- NAVBAR -->
             
                    <?php include  '../header.php'; ?>
           
 
            <!-- admin -->
            <div class="container">
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 col-lg-4 col-md-6 border p-3">
                        <h3 class="text-center">Add Client</h3>
                        <form action="index.php" method="POST">
                            <input type="text" name="name" class="form-control my-2 text-capitalize" placeholder="Name" required>
                            <input type="text" name="plan" class="form-control my-2 text-capitalize" placeholder="Plan" required>
                            <input type="text" name="due_date" class="form-control my-2 text-capitalize" placeholder="Due date" required>
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