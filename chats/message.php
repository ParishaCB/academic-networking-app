<?php

include '../connection/dbconnect.php';
session_start();

$sessionID = $_SESSION['userid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../media/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../CSS/chats.css">
    <title>Educatic | Message</title>
</head>

<body>
    <section>
        <header>
        <div class="cheaderscontainers">
            <div class="cheaderslogos">
                <a href="../userdashboard.php"><img src="../media/logo4.png" alt="EducaticLogo"></a>
            </div>
        </div>
        </header>
    </section>

       <!-- Side navigation -->
       <div class="navs-wrapper">
        <div class="navs-sidebar">
        <ul>
            <br><br><br>
            <li><a href="../userdashboard.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="../matches/matches.php"><i class="fas fa-user-graduate"></i> My Matches</a></li>
            <li><a href="./chat.php"><i class="fas fa-envelope"></i> Messages</a></li>
            <li><a href="../forum/forum.php"><i class="fas fa-comments"></i> Forums</a></li>
            <li><a href="../editprofile/editprofile.php"><i class="fas fa-user"></i> My Account</a></li><br><br><br><br><br>
            <br><br><br><br><br><br><br><li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul> 
    </div>

    <div class="wrapper">
        <section class="chatarea">
            <header>
            <?php 
            $getuserid = $_GET['userid'];

            $selectmuser = $conn->prepare("SELECT * FROM useraccounts WHERE userid = $getuserid");
            $selectmuser->execute();
            $selectuser = $selectmuser->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ( $selectuser as $user) { 
            
                $userid = $user['userid'];    
                $first_name = $user['first_name'];    
                $last_name = $user['last_name'];   
                $user_profile = $user['user_profile'];   
            ?>
                <a href="chat.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="/Educatic/<?php echo $user_profile; ?>" alt="">
                <div class="details">
                    <span><?php echo $first_name. " " . $last_name ?></span>
                </div>
            </header>
            <div class="chat-box"></div>
            
            <form action="" class="message-area" method="POST" enctype="multipart/form-data">
            <input type="text" class="receiveruser_id" name="receiveruser_id" value="<?php echo $userid; ?>" hidden>
            <input type="text" class="receiveruser_id" name="senderuser_id" value="<?php echo $getuserid; ?>" hidden>
            <input type="text" name="message" class="message-field" placeholder="Type Your Message Here..." autocomplete="off" required>
            <button><i class="fab fa-telegram-plane"></i></button>
            </form>
            <?php
            }
        ?>
        </section>
    </div>

    <script src="../JS/chat.js"></script>

</body>
</html>

