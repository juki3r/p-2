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

            <div class="row">
                <!-- NAVBAR -->
                <div class="col bg-dark">
                    <img src="../assets/images/logo.jpg" alt="" id="logo">
                    <a href="index.php">Add</a>
                    <a href="view.php">View</a>
                </div>
            </div>
            <!-- admin -->

            <div class="container">
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 col-lg-4 col-md-6 border rounded shadow p-3 mb-5">
                        <h3 class="text-center">Edit Client</h3>

                        <?php
                            if(isset($_GET['id'])){
                                $client_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM clients WHERE id='$client_id'";
                                $query_run = mysqli_query($conn, $query);
                                if(mysqli_num_rows($query_run) > 0){
                                    $client = mysqli_fetch_array($query_run);

                                    ?>
                                    <form action="edit.php" method="POST">
                                        <input type="hidden" name="id" class="form-control my-2 text-capitalize" value="<?= $client_id ?>">
                                        <label for="name" class="mx-1 text-secondary">Name</label>
                                        <input type="text" name="name" class="form-control my-2 text-capitalize" value="<?= $client['name'] ?>">
                                        <label for="plan" class="mx-1 text-secondary">Plan</label>
                                        <input type="text" name="plan" class="form-control my-2 text-capitalize"  value="<?= $client['plan'] ?>">
                                        <label for="due_date" class="mx-1 text-secondary">Due date</label>
                                        <input type="text" name="due_date" class="form-control my-2 text-capitalize" value="<?= $client['due_date'] ?>">
                                        <label for="july" class="mx-1 text-secondary">July Bill</label>
                                        <input type="text" name="july" class="form-control my-2 text-capitalize"  value="<?php if($client['July'] == NULL){echo '0';}else{echo $client['July'];} ?>">
                                        <label for="august" class="mx-1 text-secondary">August Bill</label>
                                        <input type="text" name="august" class="form-control my-2 text-capitalize" value="<?php if($client['August'] == NULL){echo '0';}else{echo $client['August'];} ?>">
                                        <label for="september" class="mx-1 text-secondary">September Bill</label>
                                        <input type="text" name="september" class="form-control my-2 text-capitalize" value="<?php if($client['September'] == NULL){echo '0';}else{echo $client['September'];}?>">
                                        <label for="october" class="mx-1 text-secondary">October Bill</label>
                                        <input type="text" name="october" class="form-control my-2 text-capitalize"  value="<?php if($client['October'] == NULL){echo '0';}else{echo $client['October'];}?>">
                                        <input type="submit" name="update_client" class="form-control bg-primary text-light" value="Submit">
                                    </form>

                                <?php
                                }
                            }



                        ?>
                        
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