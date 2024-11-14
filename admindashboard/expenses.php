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
                                <a href="add_expenses.php" class="btn btn-primary btn-sm float-end">ADD</a>
                            </h3>
                        </div>
                        <div class="card-body p-2">
                            <div class="table-responsive border rounded shadow p-4 my-3" style="height: 100%; background-color:#D3D3D3;">
                                <table class="table table-bordered table-striped table-hover text-nowrap table-sm">
                                    <caption>Project-2</caption>
                                    <tr > 
                                        <th>No.</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total amount</th>
                                        <th class="text-success">Update</th>
                                        <th class="text-danger">Delete</th>
                                    
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
                                                    <td class="text-center"><a href="edit_expenses.php?id=<?=$row['id']?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square text-success" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                        </svg>
                                                    </a></td> 
                                                    <td class="text-center"><a href="delete_expenses.php?id=<?=$row['id']?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                        </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                
                                                
                                            }
                                        }else{
                                            echo "<h5>No record found</h5>";
                                        }
                                    
                                    ?>
                                    <tr>
                                    <td colspan="7" style="color:transparent">x</td>
                                    </tr>
                                    <tr>
                                    <td colspan="7" style="color:transparent">x</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">TOTAL EXPENSES</td>
                                        <?php
                                            $query = "SELECT  SUM(total_amount) from expenses";
                                            $query_run = mysqli_query($conn, $query);
                                            
                                            while($row = mysqli_fetch_array($query_run)){
                                               
                                                echo '<td colspan="3">&#8369; '.$row['SUM(total_amount)'].'.00</td>';
                                                $totalX= $row['SUM(total_amount)'];
                                                $balance = 2000000 - $totalX;
                                                $total_expenses = "UPDATE capital SET total_expenses='$totalX', balance='$balance' where id='1' ";
                                                $resultX = mysqli_query($conn, $total_expenses); 
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