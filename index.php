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
    width: 80px;
    height: 80px;
}
#login{
    padding: 0;
    margin-top: -10px;
}
</style>
</head>
<body>
    <div class="container">
        <div class="row border rounded shadow p-0 px-lg-4 pb-3 text-light" style="margin-top: -200px;  background-color: black;">
            <div class="text-center w-100">
                <img src="assets/images/logo.jpg" alt="logo" id="logo">
                <h3 id="login">Login 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/>
                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                    </svg>
                </h3>
            </div>
            <div class="col-12">
                <form action="index.php" method="POST">
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