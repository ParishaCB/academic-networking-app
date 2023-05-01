<?php

require_once './connection/dbconnect.php';

session_start();

if(isset($_POST['submitlogin'])) {
    $email = $_POST['email'];
    $user_password = $_POST['user_password'];

    $select_stmt=$conn->prepare("SELECT * FROM useraccounts WHERE email=:email "); 
    $select_stmt->execute(array(':email'=>$email));
    $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

    if($select_stmt->rowCount() > 0) {
        if($email==$row["email"]) {
            if(password_verify($user_password, $row["user_password"])) {
                $_SESSION['login']=$email;
                $_SESSION['userid']=$row['userid'];
                $_SESSION['username']=$row['first_name'];
                echo "<script>window.open('userdashboard.php', '_self')</script>";;
            }
        }
    }else {
        echo '<script type="text/javascript">alert("Login Details Incorrect. Please Try Again.");window.location.assign("index.php");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="./media/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Educatic | Welcome</title>

    <style>
        #loader {
          position: absolute;
          left: 50%;
          top: 50%;
          z-index: 1;
          width: 120px;
          height: 120px;
          margin: -76px 0 0 -76px;
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid black;
          -webkit-animation: spin 2s linear infinite;
          animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }
        
        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
        
        .animate-bottom {
          position: relative;
          -webkit-animation-name: animatebottom;
          -webkit-animation-duration: 1s;
          animation-name: animatebottom;
          animation-duration: 1s
        }
        
        @-webkit-keyframes animatebottom {
          from { bottom:-60px; opacity:0 } 
          to { bottom:0px; opacity:1 }
        }

        @keyframes animatebottom { 
          from{ bottom:-60px; opacity:0 } 
          to{ bottom:0; opacity:1 }
        }
        
        #myDiv {
          display: none;
          text-align: center;
        }

        * {
            padding: 10px;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #148c97;
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

        .findouticon {
            width: 40px;
            height: 40px;
            position: relative;
            top: 40%;
            left: -4%;
        }

        .infolink {
            color: black;
            text-decoration: none;
            position: relative;
            top: 10%;
            left: -7%;
            font-size: 13px;
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .container {
            position: absolute;
            top: 120%;
            left: 7%;
        }

        .adminclass {
            color: black;
            text-decoration: none;
            float: right;
            font-size: 14px;
        }
        
    </style>
</head>

<body onload="myFunction()" style="margin:0;">

    <div id="loader"></div>

    <div style="display:none;" id="myDiv" class="animate-bottom">

    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="./media/logo2.png" class="img-fluid" alt="EducaticLogo"><br><br>
                    
                    <img src="./media/info.png" class="findouticon" alt="findoutmore-icon"><a href="moreinfo.php" class="infolink" target="_blank">
                        Find Out More</a>
                </div>
                
                <div class="col-lg-7 px-4 pt-4">
                    <h4>Login To Your Account</h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col">
                                <input type="Email" placeholder="Enter Your University Email" class="form-control" 
                                name="email" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="Password" placeholder="Enter Your Password" class="form-control" 
                                name="user_password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <button class="btn1" type="submit" name="submitlogin">Login</button>
                            </div>
                        </div>
                        <p>Don't Have An Account?<a href="register.php">Sign Up Here!</a></p>
                        <a href="./password-recovery/forgotpassword.php">Forgot Password?</a><br><br>
                        <a href="./admin/adminlogin.php" class="adminclass">Admin</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

    </div>

    <script>
    var myVar;
    
    function myFunction() {
      myVar = setTimeout(showPage, 1200);
    }
    
    function showPage() {
      document.getElementById("loader").style.display = "none";
      document.getElementById("myDiv").style.display = "block";
    }
    </script>

</body>
</html>