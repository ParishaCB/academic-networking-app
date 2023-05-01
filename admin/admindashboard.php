<?php

include '../connection/dbconnect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../media/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../CSS/dashboardstyle.css">
    <title>Educatic | Admin Dashboard</title>
</head>


<body>
    <section>
        <header>
        <div class="headerscontainers">
            <div class="headerslogos">
                <a href="./admindashboard.php"><img src="../media/logo4.png" alt="EducaticLogo"></a>
            </div>
        </div>
        </header>
    </section>

    <!-- Side navigation -->
    <div class="navs-wrapper">
    <div class="navs-sidebar">
        <ul>
            <br><br><br>
            <li><a href="admindashboard.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="manageforum.php"><i class="fas fa-comments"></i> Manage Forums</a></li>
            <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul> 
    </div>
    
    <div class="main_contents">
        <div class="admain_headers">&#128075; Welcome <?php echo $_SESSION['username'] ,'!' ?></div><br>
    </div>

</body>
</html>


