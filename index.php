<?php
//include database connector
session_start();

include 'dataBaseConn.php';

if(isset($_SESSION['id'])){
    if($_SESSION['usertype'] == 'investor'){
        header("Location: dashboard");
    }else{
        header("Location: admindashboard");
    }
    
}

if(isset($_POST['username']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Get all the values of input and store in variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)){
        header("Location: index.php?error=Username is required !");
        exit();
    }
    else if(empty($password)){
        header("Location: index.php?error=Password is required !");
        exit();
    }else{
        $check_username = mysqli_query($conn, "SELECT id, password, login, usertype FROM user WHERE username='$username'");
        $row = mysqli_fetch_array($check_username);
        if ($row && password_verify($password, $row['password'])){
            if($row['login'] != 'yes'){
                if($row['usertype'] == 'investor'){
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['usertype'] = $row['usertype'];
                    $sql = mysqli_query($conn, "UPDATE user SET login='yes' WHERE username='$username'");
                    header("Location: dashboard");
                    exit();
                }else{
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['usertype'] = $row['usertype'];
                    $sql = mysqli_query($conn, "UPDATE user SET login='no' WHERE username='$username'");
                    header("Location: admindashboard");
                }
                
            }else{
                echo "<script>alert('Account already login by someone !')</script>";
            }
                
        } else {
            header("Location: index.php?error=Incorrect Username and password");
            exit();
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="assets/images/logo.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="../images/favicon_io/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
    body{
        /* background-color: lightgray; */
    }
.container{
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
#logo{
    width: 120px;
    height: 100px;
}
#login{
    padding: 0;
    margin-top: -10px;
}
</style>
</head>
<body>
    <div class="container">
        <div class="row h-100 w-100 d-flex justify-content-center align-items-center">
            <div class="col-12 col-lg-4 col-md-7 border shadow rounded p-3">
                <div class="text-center w-100 p-0 m-0 bg-info">
                    <img src="assets/images/logo.jpg" alt="logo" id="logo">
                </div>
                <form action="index.php" method="POST" class="p-3 mt-0">
                <?php if(isset($_GET['error'])){?> <p class="error p-0 m-0 text-danger"> <?php echo $_GET['error']; ?> </p> <?php }?>
                    <label for="username" class="m-0 mt-2">Username</label>
                    <input class="form-control p-1" type="text" name="username" required>
                    <label for="username" class="m-0 mt-2">Password</label>
                    <input class="form-control p-1" type="text" name="password" required>
                    <input class="form-control mt-4 p-1 bg-primary text-white" type="submit" name="submit" value="Submit">
                    <p class="py-0 mt-3" style="font-size: 12px;">Forgot password? <a href="" onclick="forgotPassword()">Click here</a></p>
                </form>
            </div>
        </div>
    </div>

<script>
    function forgotPassword(){
        alert("Please contact JUPITER ")
    }
</script>
</body>
</html>