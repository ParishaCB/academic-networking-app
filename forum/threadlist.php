<?php

include '../connection/dbconnect.php';
session_start();

$session = $_SESSION['userid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../media/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<!-- Add IntroJs styles -->
	<link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css">
    <link rel="stylesheet" href="../CSS/forum.css">
    <title>Educatic | Forums</title>
</head>

<body>
    <section>
        <header>
        <div class="forumscontainers">
            <div class="forumslogos">
                <a href="../userdashboard.php"><img src="../media/logo4.png" alt="EducaticLogo"></a>
            </div>

            <div class="fmenulinks">
                <ul>
                    <li><a href="./forum.php">Back To Categories</a></li>
                </ul>
            </div>
        </div>
        </header>
    </section>

    <?php

    $threadid = $_GET['threadid'];

    $sqlfind = "SELECT * FROM threads WHERE thread_id = $threadid";
    $threadqs = $conn->query($sqlfind);
    $getqs = $threadqs->fetchAll(PDO::FETCH_ASSOC);

    foreach ( $getqs as $questions) { 
            
        $title = $questions['thread_title'];    
        $descr = $questions['thread_description'];    
        $thread_user_id = $questions['thread_user_id'];    

        $sql6 = "SELECT first_name, last_name, email FROM useraccounts WHERE userid = $thread_user_id";
        $userinfo = $conn->query($sql6);
        $getuser2 = $userinfo->fetch(PDO::FETCH_ASSOC);

    ?>

    <section>
        <div class="forumcontainer">
            <h1 class="forumheading"><?php echo $title ?></h1><br>
            <p class="forumtext"><?php echo $descr ?></p><br>
            <p class="forumtext">Asked By: <?php echo $getuser2['first_name']; ?> <?php echo $getuser2['last_name']; ?></p><br>
            <p class="forumtext">Email <?php echo $getuser2['email']; ?></p><br>
        </div>

        <?php
            }
        ?>
    </section>

    <?php
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];

        if($method=='POST') {
        $comment = $_POST['comment_content'];
        $sqlins3 = "INSERT INTO comments (comment_content, thread_id, comment_by, comment_time) VALUES
                     ('$comment', '$threadid', '$session', current_timestamp()); ";
        $conn->exec($sqlins3);
        $showAlert = true;

        if($showAlert) {
            echo '<div class="successalert2">Your Comment Has Been Successfully Added!</div>';
        }
    }
    ?>

    <section>
        <div class="browsecat">
            <h2 class="threadlheading">Discussions + Comments</h2>
        </div>
    
    <?php

    $catid = $_GET['threadid'];

    $sqlqs = "SELECT * FROM comments WHERE thread_id = $catid";
    $threads= $conn->query($sqlqs);
    $gethread = $threads->fetchAll(PDO::FETCH_ASSOC);
    $noResult = true;

     foreach ( $gethread as $thread) { 
        $noResult = false;
        $cid = $thread['comment_id'];    
        $content = $thread['comment_content'];    
        $commentby = $thread['comment_by'];    

        $sql5 = $conn->prepare("SELECT * FROM useraccounts WHERE userid = $commentby");
        $sql5->execute();
        $row = $sql5->fetch(PDO::FETCH_ASSOC);
        $getuser4 = array($row['user_profile'], $row['first_name'], $row['last_name']);

    ?>
        <div>
            <img src="/Educatic/<?php echo $row['user_profile']?>" class="forumimage"><br><br>
            <p class="threadesc"><b><?php echo $row['first_name']?> <?php echo $row['last_name']?> </b> Replied:</p><br>
            <p class="threadesc"><?php echo $content?></p>
        </div>
        
        <?php
            }
            if($noResult) { ?>
                <div class="noresultcontainer">
                    <h1 class="noresulthead">No Comments Found.</h1>
                    <p class="noresulttext">Be The First To Start A Discussion!</p>
                </div>

        <?php
            }
        ?>
      
    </section>
    
    <div class="threadcreate">
        <h2>Start A Discussion</h2><br>
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data">

            <label for="threaddesc" class="threadelem">Enter Your Comments</label><br>
            <br><textarea name="comment_content" class="threadeleme"></textarea><br><br>

            <button type="submit" class="threadsubmit" name="discsubmit">Post Comment</button>
        
        </form>
    </div>

</body>
</html>