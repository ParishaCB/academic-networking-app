<?php

include './connection/dbconnect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="./media/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<!-- Add IntroJs styles -->
	<link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css">
    <link rel="stylesheet" href="./CSS/dashboardstyle.css">
    <title>Educatic | Welcome</title>
</head>


<body>
    <section>
        <header>
        <div class="headerscontainers">
            <div class="headerslogos">
                <a href="./userdashboard.php"><img src="./media/logo4.png" alt="EducaticLogo" data-step="1" data-title="Welcome To Educatic."
                data-intro="This is a short guided tour to help you get started."></a>
            </div>
        </div>
        </header>
    </section>

    <!-- Side navigation -->
    <div class="navs-wrapper">
    <div class="navs-sidebar">
        <ul>
            <br><br><br>
            <li><a href="userdashboard.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="./matches/matches.php" data-step="2" data-title="Your Matches" data-intro="This is where all the people that share similar interests with you will be displayed."><i class="fas fa-user-graduate"></i> My Matches</a></li>
            <li><a href="./chats/chat.php" data-step="3" data-title="Your Messages" data-intro="This is where all your messages can be accessed. Any conversations you have with people will be available here."><i class="fas fa-envelope"></i> Messages</a></li>
            <li><a data-step="4" data-title="Forums" data-intro="Interested in discussing a particular topic or subject area with your peers?
            Use our forums to join discussions and share your opinions!" href="forum/forum.php"><i class="fas fa-comments"></i> Forums</a></li>
            <li><a href="./editprofile/editprofile.php" data-step="5" data-title="Your Profile" data-intro="All information related to your profile can be found here and you can 
            edit any information about your profile here."><i class="fas fa-user"></i> My Account</a></li><br><br><br><br><br>
            <br><br><br><br><br><br><br><li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul> 
    </div>
    
    <div class="main_contents">
        <div class="main_headers">&#128075; Welcome To Educatic, <?php echo $_SESSION['username'] ,'!' ?></div><br>
        <div class="infos">
            <p>We are so happy to have you join our growing community of students wishing to build their connections with their 
            peers around campus.</p><br>
            <p>If you are new here, you can click on the 'Show Me Around' button (below) to help you get started!</p><br>
            <a href="javascript:void(0);" onclick="javascript:introJs().start();"><button class="tourbuttons">Show Me Around</a></button><br>
            <br><br><p>Happy Networking! &#128522;</p>
        </div>
    </div>


<script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
</body>
</html>


