<?php 
session_start();
require '../dataBaseConn.php';
// If Session id and name are present proceed to dashboard
if(isset($_GET['id'])){   
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit</title>
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
                    <div class="col-12 col-lg-4 col-md-6 border rounded shadow p-3 mb-5">
                        <h3 class="text-center">Edit Expenses</h3>

                        <?php
                            if(isset($_GET['id'])){
                                $client_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM expenses WHERE id='$client_id'";
                                $query_run = mysqli_query($conn, $query);
                                if(mysqli_num_rows($query_run) > 0){
                                    $client = mysqli_fetch_array($query_run);

                                    ?>
                                    <form action="update_expenses.php" method="POST">
                                        <input type="hidden" name="id" class="form-control my-2 text-capitalize" value="<?= $client_id ?>">
                                        <label for="description" class="mx-1 text-secondary">Description</label>
                                        <input type="text" name="description" class="form-control my-2 text-capitalize" value="<?= $client['description'] ?>">
                                        <label for="qnty" class="mx-1 text-secondary">Quantity</label>
                                        <input type="text" name="qnty" class="form-control my-2 text-capitalize"  value="<?= $client['qnty'] ?>">
                                        <label for="price" class="mx-1 text-secondary">Price</label>
                                        <input type="text" name="price" class="form-control my-2 text-capitalize" value="<?= $client['price'] ?>">
                                        <input type="submit" name="submit" class="form-control bg-primary text-light" value="Submit">
                                    </form>

                                <?php
                                }
                            }



                        ?>
                        
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