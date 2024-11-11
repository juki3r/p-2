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
            /* body{
                background-color:#D3D3D3;
            } */
            #logo{
                width: 150px;
                height: 100px;
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
        <div class="container-fluid">

            <div class="row">
                <!-- NAVBAR -->
                <div class="col bg-dark text-light">
                    <img src="../assets/images/logo.jpg" alt="" id="logo">
                    <a href="index.php"><span>Add</span></a>
                    <a href="view.php"><span>View</span></a>
                </div>
            </div>
            <!-- INVESTOR -->
            <div class="container-fluid mt-4">
                <span class="text-success p-2"><?php if(empty($_GET['message'])){echo "";}else{echo $_GET['message'];} ?></span>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="px-1">
                                INTERNET SUBSCRIBERS
                                <a href="index.php" class="btn btn-primary btn-sm float-end">Back</a>
                            </h3>
                        </div>
                        <div class="card-body p-2" style="background-color:#D3D3D3;">
                            <div class="table-responsive border rounded shadow p-4 my-3" style="height: 100%;">
                                <table class="table table-bordered table-striped table-hover text-nowrap table-sm">
                                    <caption>Project-2</caption>
                         
                                        <tr > 
                                            <th colspan="4" class="text-center text-light py-3" style="font-size: 20px !important; background-color:#091057">Clients</th>
                                            <th 
                                            <?php 
                                                if($month == 1 && $month < 2 ){
                                                    echo 'colspan="1"';
                                                }else if($month == 2 && $month < 3){
                                                    echo 'colspan="2"';
                                                }else if($month == 3 && $month < 4){
                                                    echo 'colspan="3"';
                                                }else if($month == 4 && $month < 5){
                                                    echo 'colspan="4"';
                                                }else if($month == 5 && $month < 6){
                                                    echo 'colspan="5"';
                                                }else if($month == 6 && $month < 7){
                                                    echo 'colspan="6"';
                                                }else if($month == 7 && $month < 8){
                                                    echo 'colspan="7"';
                                                }else if($month == 8 && $month < 9){
                                                    echo 'colspan="8"';
                                                }else if($month == 9 && $month < 10){
                                                    echo 'colspan="9"';
                                                }else if($month == 10 && $month < 11){
                                                    echo 'colspan="10"';
                                                }else if($month == 11 && $month < 12){
                                                    echo 'colspan="11"';
                                                }else if($month >= 12){
                                                    echo 'colspan="12"';
                                                }
                                            ?> 
                                            class="text-center text-light py-3" style="font-size: 20px !important; background-color:#740938;">Billing</th>
                                            <th colspan="2" class="text-center py-3 text-light" style="font-size: 20px !important; background-color:#433878;">Actions</th>
                                        </tr>
                                    
                                    <tr > 
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Internet Plan</th>
                                        <th>Due date</th>
                                        <?php 
                                            if(1 <= $month){
                                                echo '<th class="bg-warning">January</th>';
                                            }
                                            if(2 <= $month){
                                                echo '<th class="bg-warning">Febuary</th>';
                                            }
                                            if(3 <= $month){
                                                echo '<th class="bg-warning">March</th>';
                                            }
                                            if(4 <= $month){
                                                echo '<th class="bg-warning">April</th>';
                                            }
                                            if(5 <= $month){
                                                echo '<th class="bg-warning">May</th>';
                                            }
                                            if(6 <= $month){
                                                echo '<th class="bg-warning">June</th>';
                                            }
                                            if(7 <= $month){
                                                echo '<th class="">July</th>';
                                            }
                                            if(8 <= $month){
                                                echo '<th class="">August</th>';
                                            }
                                            if(9 <= $month){
                                                echo '<th class="">September</th>';
                                            }
                                            if(10 <= $month){
                                                echo '<th class="">October</th>';
                                            }
                                            if(11 <= $month){
                                                echo '<th class="">November</th>';
                                            }
                                            if(12 <= $month){
                                                echo '<th class="">December</th>';
                                            } 
                                            
                                        ?>
        
                                        <th class="text-success">Update</th>
                                        <th class="text-danger">Delete</th>
                                    
                                    </tr>
                                   
                                    <?php
                                        $query = "SELECT * FROM clients";
                                        $results = mysqli_query($conn, $query);
                                        if(mysqli_num_rows($results) > 0){
                                            foreach($results as $row){
                                                ?>
                                                <tr>
                                                    <td class="text-uppercase"><?= $row['id']; ?></td> 
                                                    <td class="text-uppercase"><?= $row['name']; ?></td> 
                                                    <td class="text-uppercase"><?=$row['plan'];?></td>
                                                    <td class="text-uppercase"><?=$row['due_date']?></td>
                                                    <?php 
                                                        if(1 <= $month){?>
                                                            <td class='bg-warning'><?php if($row['January'] == NULL){ echo '&#8369; 0.00';}else{echo '&#8369; ' .$row['January']. '.00';}  ?></td>
                                                            <?php
                                                        }
                                                        if(2 <= $month){?>
                                                            <td class='bg-warning'><?php if($row['Febuary'] == NULL){ echo '&#8369; 0.00';}else{echo '&#8369; ' .$row['Febuary']. '.00';}  ?></td>
                                                            <?php
                                                        }
                                                        if(3 <= $month){?>
                                                           <td class='bg-warning'><?php if($row['March'] == NULL){ echo '&#8369; 0.00';}else{echo '&#8369; ' .$row['March']. '.00';}  ?></td>
                                                            <?php
                                                        }
                                                        if(4 <= $month){?>
                                                            <td class='bg-warning'><?php if($row['April'] == NULL){ echo '&#8369; 0.00';}else{echo '&#8369; ' .$row['April']. '.00';}  ?></td>
                                                            <?php
                                                        }
                                                        if(5 <= $month){?>
                                                            <td class='bg-warning'><?php if($row['May'] == NULL){ echo '&#8369; 0.00';}else{echo '&#8369; ' .$row['May']. '.00';}  ?></td>
                                                            <?php
                                                        }
                                                        if(6 <= $month){?>
                                                            <td class='bg-warning'><?php if($row['June'] == NULL){ echo '&#8369; 0.00';}else{echo '&#8369; ' .$row['June']. '.00';}  ?></td>
                                                            <?php
                                                        }
                                                        if(7 <= $month){?>
                                                            <td class=''><?php if($row['July'] == NULL){ echo '&#8369; 0.00';}else{echo '&#8369; ' .$row['July']. '.00';}  ?></td>
                                                            <?php
                                                        }
                                                        if(8 <= $month){?>
                                                            <td class=''><?php if($row['August'] == NULL){ echo '&#8369; 0.00';}else{echo '&#8369; ' .$row['August']. '.00';}  ?></td>
                                                            <?php
                                                        }
                                                        if(9 <= $month){?>
                                                            <td class=''><?php if($row['September'] == NULL){ echo '&#8369; 0.00';}else{echo '&#8369; ' .$row['September']. '.00';}  ?></td>
                                                            <?php
                                                        }
                                                        if(10 <= $month){?>
                                                            <td class=''><?php if($row['October'] == NULL){ echo '&#8369; 0.00';}else{echo '&#8369; ' .$row['October']. '.00';}  ?></td>
                                                            <?php
                                                        }
                                                        if(11 <= $month){?>
                                                            <td class=''><?php if($row['November'] == NULL){ echo '&#8369; 0.00';}else{echo '&#8369; ' .$row['November']. '.00';}  ?></td>
                                                            <?php
                                                        }
                                                        if(12 <= $month){?>
                                                            <td class=''><?php if($row['December'] == NULL){ echo '&#8369; 0.00';}else{echo '&#8369; ' .$row['December']. '.00';}  ?></td>
                                                            <?php
                                                        } 
                                                        
                                                    ?>
                                                    <td class="text-center"><a href="edit.php?id=<?=$row['id']?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square text-success" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                        </svg>
                                                    </a></td> 
                                                    <td class="text-center"><a href="delete.php?id=<?=$row['id']?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                    </svg>
                                                    </a></td>
                                                </tr>
                                                <?php
                                            }
                                        }else{
                                            echo "<h5>No record found</h5>";
                                        }
                                    
                                        ?>
                                        <tr class="mt-4" >
                                            <td colspan="4" style="color:transparent">x</td>
                                            <td class="text-center bg-warning">&#8595;</td>
                                            <td class="text-center bg-warning">&#8595;</td>
                                            <td class="text-center bg-warning">&#8595;</td>
                                            <td class="text-center bg-warning">&#8595;</td>
                                            <td class="text-center bg-warning">&#8595;</td>
                                            <td class="text-center bg-warning">&#8595;</td>
                                            <td class="text-center">&#8595;</td>
                                            <td class="text-center">&#8595;</td>
                                            <td class="text-center">&#8595;</td>
                                            <td class="text-center">&#8595;</td>
                                            <td class="text-center">&#8595;</td>
                                            <td colspan="2" style="color:transparent">x</td>
                                        </tr>
                                        <tr class="mt-4" >
                                        <td colspan="4" style="color:transparent">x</td>
                                            <td class="text-center bg-warning">&#8595;</td>
                                            <td class="text-center bg-warning">&#8595;</td>
                                            <td class="text-center bg-warning">&#8595;</td>
                                            <td class="text-center bg-warning">&#8595;</td>
                                            <td class="text-center bg-warning">&#8595;</td>
                                            <td class="text-center bg-warning">&#8595;</td>
                                            <td class="text-center">&#8595;</td>
                                            <td class="text-center">&#8595;</td>
                                            <td class="text-center">&#8595;</td>
                                            <td class="text-center">&#8595;</td>
                                            <td class="text-center">&#8595;</td>
                                            <td colspan="2" style="color:transparent">x</td>
                                        </tr>
                                        <tr class="mt-4">
                                            <td colspan="4" class="text-center">SUM</td>

                                            <?php
                                                $query = "SELECT  SUM(January), SUM(Febuary), SUM(March), SUM(April),
                                                                    SUM(May), SUM(June), SUM(July), SUM(August),
                                                                    SUM(September), SUM(October), SUM(November), SUM(December)
                                                                    from clients";
                                                $query_run = mysqli_query($conn, $query);

                                                while($row = mysqli_fetch_array($query_run)){
                                                    if(1 <= $month){
                                                        echo '<td class="bg-warning">&#8369; '.$row['SUM(January)'].'.00</td>';
                                                    }
                                                    if(2 <= $month){
                                                        echo '<td class="bg-warning">&#8369; '.$row['SUM(Febuary)'].'.00</td>';
                                                    }
                                                    if(3 <= $month){
                                                        echo '<td class="bg-warning">&#8369; '.$row['SUM(March)'].'.00</td>';
                                                    }
                                                    if(4 <= $month){
                                                        echo '<td class="bg-warning">&#8369; '.$row['SUM(April)'].'.00</td>';
                                                    }
                                                    if(5 <= $month){
                                                        echo '<td class="bg-warning">&#8369; '.$row['SUM(May)'].'.00</td>';
                                                    }
                                                    if(6 <= $month){
                                                        echo '<td class="bg-warning">&#8369; '.$row['SUM(June)'].'.00</td>';
                                                    }
                                                    if(7 <= $month){
                                                        echo '<td>&#8369; '.$row['SUM(July)'].'.00</td>';
                                                    }
                                                    if(8 <= $month){
                                                        echo '<td>&#8369; '.$row['SUM(August)'].'.00</td>';
                                                    }
                                                    if(9 <= $month){
                                                        echo '<td>&#8369; '.$row['SUM(September)'].'.00</td>';
                                                    }
                                                    if(10 <= $month){
                                                        echo '<td>&#8369; '.$row['SUM(October)'].'.00</td>';
                                                    }
                                                    if(11 <= $month){
                                                        echo '<td>&#8369; '.$row['SUM(November)'].'.00</td>';
                                                    }
                                                    if(12 <= $month){
                                                        echo '<td>&#8369; '.$row['SUM(December)'].'.00</td>';
                                                    }
                                                   
                                                }
                                            ?>
                                            <td colspan="2"></td>
                                          
                                        </tr>
                                        <tr class="mt-4" style="border: 1px solid black;">
                                            <td colspan="4" class="text-center bg-success text-light py-2">TOTAL</td>

                                            <?php
                                                $query = "SELECT  SUM(January), SUM(Febuary), SUM(March), SUM(April),
                                                                    SUM(May), SUM(June), SUM(July), SUM(August),
                                                                    SUM(September), SUM(October), SUM(November), SUM(December)
                                                                    from clients";
                                                $query_run = mysqli_query($conn, $query);

                                                while($row = mysqli_fetch_array($query_run)){
                                                    if(1 <= $month){
                                                        echo '<td style="border:none">&#8594</td>';
                                                    }
                                                    if(2 <= $month){
                                                        echo '<td style="border:none">&#8594</td>';
                                                    }
                                                    if(3 <= $month){
                                                        echo '<td style="border:none">&#8594</td>';
                                                    }
                                                    if(4 <= $month){
                                                        echo '<td style="border:none">&#8594</td>';
                                                    }
                                                    if(5 <= $month){
                                                        echo '<td style="border:none">&#8594</td>';
                                                    }
                                                    if(6 <= $month){
                                                        echo '<td style="border:none">&#8594</td>';
                                                    }
                                                    if(7 <= $month){
                                                        echo '<td style="border:none">&#8594</td>';
                                                    }
                                                    if(8 <= $month){
                                                        echo '<td style="border:none">&#8594</td>';
                                                    }
                                                    if(9 <= $month){
                                                        echo '<td style="border:none">&#8594</td>';
                                                    }
                                                    if(10 <= $month){
                                                        echo '<td style="border:none">&#8594</td>';
                                                    }
                                                    if(11 <= $month){
                                                        echo '<td style="border:none">&#8594</td>';
                                                    }
                                                    if(12 <= $month){
                                                        echo '<td style="border:none">&#8594</td>';
                                                    }
                                                    $total = $row['SUM(January)'] + $row['SUM(Febuary)']+ $row['SUM(March)']+ $row['SUM(April)']
                                                            + $row['SUM(May)']+ $row['SUM(June)']+ $row['SUM(July)']+ $row['SUM(August)']
                                                            + $row['SUM(September)']+ $row['SUM(October)']+ $row['SUM(November)']+ $row['SUM(December)'];
                                                    echo '<td colspan="2" class="text-center bg-success text-light py-2">&#8369; '.$total.'.00</td>';
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

        
    </body>
    </html>

    <?php
// If Session id and name are not present, go back to login page
}else{ 
    header("Location: ../index.php");
    exit();
}


?>