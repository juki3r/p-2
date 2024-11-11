<?php 
session_start();
// If Session id and name are present proceed to dashboard
if(isset($_SESSION['id'])){   
    include '../dataBaseConn.php';
    ?>

    <?php
    if(isset($_POST['submit'])){
        $description = $_POST['description'];
        $qnty = $_POST['qnty'];
        $price = $_POST['price'];
        $total_amount = $qnty * $price;
   
     
        $sql = "INSERT INTO expenses (description, qnty, price, total_amount) VALUES('$description', '$qnty', '$price', '$total_amount')";
        $query = mysqli_query($conn, $sql);
        if($query){
            echo "<script>alert('Expenses added !')</script>";
        }else{
            echo "<script>alert('Please try again !')</script>";
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
        body{
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
    </style>
    </head>
    <body>
        <?php include  '../header.php'; ?>

        <div class="container-fluid">
            <div class="container">
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 col-lg-4 col-md-6 border p-3">
                        <h3 class="text-center">Add Expenses</h3>
                        <form action="add_expenses.php" method="POST">
                            <input type="text" name="description" class="form-control my-2 text-capitalize" placeholder="Description" required>
                            <input type="text" name="qnty" class="form-control my-2 text-capitalize" placeholder="Quantity" required>
                            <input type="text" name="price" class="form-control my-2 text-capitalize" placeholder="Price" required>
                            <input type="submit" name="submit" class="form-control bg-primary text-light" value="Submit">
                        </form>
                    </div>
                </div>     
            </div>
        </div>
        <?php include '../footer.php';?>
        
        


    </body>
    </html>

    <?php
// If Session id and name are not present, go back to login page
}else{ 
    header("Location: ../index.php");
    exit();
}


?>