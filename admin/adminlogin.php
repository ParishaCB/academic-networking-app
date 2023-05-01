<?php

require_once '../connection/dbconnect.php';

session_start();

if(isset($_POST['adminlogin'])) {
    $adusername = $_POST['username'];
    $adpassword = $_POST['password'];

    $select_admin=$conn->prepare("SELECT * FROM admin WHERE username='$adusername' and password='$adpassword' "); 
    $select_admin->setFetchMode(PDO::FETCH_ASSOC);
    $select_admin->execute();
    $admindata=$select_admin->fetch();

    if ($admindata == false) {
        echo"<script>'Login Failed. Please Try Again.'</script>";
    }elseif($admindata['username']==$adusername and $admindata['password']==$adpassword) {
        $_SESSION['username']=$admindata['username'];
        echo "<script>window.open('admindashboard.php', '_self')</script>";;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../media/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Educatic | Admin</title>

    <style>
    
        * {
            padding: 10px;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: white;
        }

        .row {
            background-color: white; 
            border-radius: 13px;
            align-items: center;
            text-align: center;
        }

        .btn1 {
            background-color: black;
            border: none;
            color: white;
        }

        .container {
            position: absolute;
            top: 20%;
            left: 8%;
            background-color: black;
        }

        .adminclass {
            color: black;
            text-decoration: none;
            float: right;
            font-size: 14px;
        }
        
    </style>
</head>

<body>

    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="../media/logo2.png" class="img-fluid" alt="EducaticLogo"><br><br>
                    
                </div>
                
                <div class="col-lg-7 px-4 pt-4">
                    <h4>Admin Login</h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" placeholder="Enter Your Username" class="form-control" 
                                name="username" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="Password" placeholder="Enter Your Password" class="form-control" 
                                name="password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <button class="btn1" type="submit" name="adminlogin">Login</button><br><br>
                            </div>
                        </div>
                        <p>Not An Admin?<a href="../index.php">Login Here</a></p>
                     </form>
                </div>
            </div>
        </div>
    </section>

    </div>

</body>
</html>