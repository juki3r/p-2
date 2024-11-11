<?php 
session_start();
// If Session id and name are present proceed to dashboard
if(isset($_SESSION['id'])){   
    include '../dataBaseConn.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="shortcut icon" href="../assets/images/logo.jpg" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
   
        <style>
            table th, table td{
                padding-left: 10px !important;
            }
            .table-bordered > tbody > tr > th {
                border: 1px solid black;
            }
            .table-bordered > tbody > tr > td {
                border: 1px solid black;
            } 
        </style>
    </head>
    <body>

        <?php include  '../header.php'; ?>
        
        <div class="container-fluid">
            <!-- INVESTOR -->
            <div class="container">
                <div class="col-12">
                    <div class="table-responsive border rounded shadow p-4 my-3" style="height: 100%;">
                        <table class="table table-bordered table-hover text-nowrap table-sm" id="sortTable">
                            <caption>Project-2</caption>
                            <tr > 
                                <th colspan="3" class="text-center bg-info" >Clients</th>
                                <th colspan="4" class="text-center bg-secondary">Billing</th>
                            </tr>
                            <tr > 
                                <th>Name</th>
                                <th>Internet Plan</th>
                                <th>Due date</th>
                                <th class="bg-warning">July</th>
                                <th class="bg-success">August</th>
                                <th class="bg-warning">September</th>
                                <th class="bg-success">October</th>
                            </tr>
                            <?php
                                $query = "SELECT * FROM clients";
                                $results = mysqli_query($conn, $query);
                                while($row = $results->fetch_assoc()){
                                    echo '<tr>
                                            <td class="text-capitalize">'.$row['name'].'</td> 
                                            <td class="text-capitalize">'.$row['plan'].'</td>
                                            <td class="text-capitalize">'.$row['due_date'].'</td>
                                            <td class="bg-warning">'.'&#8369; ' .$row['July'].'.00'.'</td> 
                                            <td class="bg-success">'.'&#8369; ' .$row['August'].'.00'.'</td> 
                                            <td class="bg-warning">'.'&#8369; ' .$row['September'].'.00'.'</td>
                                            <td class="bg-success">'.'&#8369; ' .$row['October'].'.00'.'</td> 
                                        </tr>';
                                }
                                ?>
                                <tr class="mt-4" >
                                    <td style="color:transparent">x</td>
                                    <td style="color:transparent">x</td>
                                    <td style="color:transparent">x</td>
                                    <td class="text-center">&#8595;</td>
                                    <td class="text-center">&#8595;</td>
                                    <td class="text-center">&#8595;</td>
                                    <td class="text-center">&#8595;</td>
                                </tr>
                                <tr class="mt-4">
                                    <td colspan="3" class="text-center">Total</td>
                                    <td class="bg-warning">July</td>
                                    <td class="bg-success">August</td>
                                    <td class="bg-warning">September</td>
                                    <td class="bg-success">October</td>
                                </tr>
                        </table>
                        <script>
                            $('#sortTable').DataTable();
                        </script>
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