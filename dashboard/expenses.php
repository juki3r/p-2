<?php 
session_start();
// If Session id and name are present proceed to dashboard
if(isset($_SESSION['id'])){   
    include '../dataBaseConn.php';
    $date = getdate(); $month = $date['mon'];
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
            table th, table td{
                padding: 0 0 0 5px !important;
            }
            .table-bordered > tbody > tr > th {
                border: 1px solid black;
            }
            .table-bordered > tbody > tr > td {
                border: 1px solid black;
            }
            table th{
                font-weight: 500;
                font-size: 18px;
            }
            table td{
                font-weight: 400;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
    <?php include  '../header.php'; ?>
    
        <div class="container-fluid">
            <!-- INVESTOR -->
            <div class="container-fluid mt-4">
                <span class="text-success p-2"><?php if(empty($_GET['message'])){echo "";}else{echo $_GET['message'];} ?></span>
                <div class="col-12">
                    <div class="card mb-5">
                        <div class="card-header">
                            <h3 class="px-1">
                                EXPENSES
                                <a href="pisowifi.php" class="btn btn-primary btn-sm float-end">Back</a>
                            </h3>
                        </div>
                        <div class="card-body p-2">
                            <div class="table-responsive border rounded shadow p-4 my-3" style="height: 100%; background-color:#D3D3D3;">
                                <table class="table table-bordered table-striped table-hover text-nowrap table-sm">
                                    <caption>Project-bravo</caption>
                                    <tr > 
                                        <th>No.</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total amount</th>
                                    
                                    </tr>
                                   
                                    <?php
                                        $query = "SELECT * FROM expenses";
                                        $results = mysqli_query($conn, $query);
                                        if(mysqli_num_rows($results) > 0){
                                            foreach($results as $row){
                                                ?>
                                                <tr>
                                                    <td class="text-uppercase"><?= $row['id']; ?></td> 
                                                    <td class="text-uppercase"><?= $row['description']; ?></td> 
                                                    <td class="text-uppercase"><?= $row['qnty']; ?></td> 
                                                    <td class="text-uppercase">&#8369; <?= $row['price']; ?>.00</td> 
                                                    <td class="text-uppercase">&#8369; <?= $row['total_amount']; ?>.00</td> 
                                                </tr>
                                                <?php
                                                
                                                
                                            }
                                        }else{
                                            echo "<h5>No record found</h5>";
                                        }
                                    
                                    ?>
                                    <tr>
                                    <td colspan="5" style="color:transparent">x</td>
                                    </tr>
                                    <tr>
                                    <td colspan="5" style="color:transparent">x</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">TOTAL EXPENSES</td>
                                        <?php
                                            $query = "SELECT  SUM(total_amount) from expenses";
                                            $query_run = mysqli_query($conn, $query);

                                            while($row = mysqli_fetch_array($query_run)){
                                                echo '<td colspan="1">&#8369; '.$row['SUM(total_amount)'].'.00</td>';
                                            
                                            }
                                        ?>
                                    </tr>
                                       
                                       
                                </table>
                        </div>
                        </div>
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