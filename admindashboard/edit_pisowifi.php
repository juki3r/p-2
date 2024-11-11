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
    <body>
        <?php include  '../header.php'; ?>
        
        <div class="container-fluid">
            <div class="container">
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 col-lg-4 col-md-6 border rounded shadow p-3 mb-5">
                        <h3 class="text-center">Edit Client</h3>

                        <?php
                            if(isset($_GET['id'])){
                                $client_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM pisowifi WHERE id='$client_id'";
                                $query_run = mysqli_query($conn, $query);
                                if(mysqli_num_rows($query_run) > 0){
                                    $client = mysqli_fetch_array($query_run);

                                    ?>
                                    <form action="update_pisowifi.php" method="POST">
                                        <input type="hidden" name="id" class="form-control my-2 text-capitalize" value="<?= $client_id ?>">

                                        <label for="vendo_name" class="mx-1 text-secondary">Vendo name</label>
                                        <input type="text" name="vendo_name" class="form-control my-2 text-capitalize" value="<?= $client['vendo_name'] ?>">
                                        <label for="january" class="mx-1 text-secondary">January Income</label>
                                        <input type="text" name="january" class="form-control my-2 text-capitalize"  value="<?php if($client['January'] == NULL){echo '0';}else{echo $client['January'];} ?>">
                                        <label for="febuary" class="mx-1 text-secondary">Febuary Income</label>
                                        <input type="text" name="febuary" class="form-control my-2 text-capitalize"  value="<?php if($client['Febuary'] == NULL){echo '0';}else{echo $client['Febuary'];} ?>">
                                        <label for="march" class="mx-1 text-secondary">March Income</label>
                                        <input type="text" name="march" class="form-control my-2 text-capitalize"  value="<?php if($client['March'] == NULL){echo '0';}else{echo $client['March'];} ?>">
                                        <label for="april" class="mx-1 text-secondary">April Income</label>
                                        <input type="text" name="april" class="form-control my-2 text-capitalize"  value="<?php if($client['April'] == NULL){echo '0';}else{echo $client['April'];} ?>">
                                        <label for="may" class="mx-1 text-secondary">May Income</label>
                                        <input type="text" name="may" class="form-control my-2 text-capitalize"  value="<?php if($client['May'] == NULL){echo '0';}else{echo $client['May'];} ?>">
                                        <label for="june" class="mx-1 text-secondary">June Income</label>
                                        <input type="text" name="june" class="form-control my-2 text-capitalize"  value="<?php if($client['June'] == NULL){echo '0';}else{echo $client['June'];} ?>">
                                        <label for="july" class="mx-1 text-secondary">July Income</label>
                                        <input type="text" name="july" class="form-control my-2 text-capitalize"  value="<?php if($client['July'] == NULL){echo '0';}else{echo $client['July'];} ?>">
                                        <label for="august" class="mx-1 text-secondary">August Income</label>
                                        <input type="text" name="august" class="form-control my-2 text-capitalize" value="<?php if($client['August'] == NULL){echo '0';}else{echo $client['August'];} ?>">
                                        <label for="september" class="mx-1 text-secondary">September Income</label>
                                        <input type="text" name="september" class="form-control my-2 text-capitalize" value="<?php if($client['September'] == NULL){echo '0';}else{echo $client['September'];}?>">
                                        <label for="october" class="mx-1 text-secondary">October Income</label>
                                        <input type="text" name="october" class="form-control my-2 text-capitalize"  value="<?php if($client['October'] == NULL){echo '0';}else{echo $client['October'];}?>">
                                        <label for="november" class="mx-1 text-secondary">November Income</label>
                                        <input type="text" name="november" class="form-control my-2 text-capitalize"  value="<?php if($client['November'] == NULL){echo '0';}else{echo $client['November'];}?>">
                                        <label for="december" class="mx-1 text-secondary">December Income</label>
                                        <input type="text" name="december" class="form-control my-2 text-capitalize"  value="<?php if($client['December'] == NULL){echo '0';}else{echo $client['December'];}?>">
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