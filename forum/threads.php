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

    $catid = $_GET['catid'];

    $sqlfind2 = "SELECT * FROM useraccounts WHERE userid = $session";
    $userinfo = $conn->query($sqlfind2);
    $user = $userinfo->fetchAll(PDO::FETCH_ASSOC);

    $sqlfind = "SELECT * FROM categories WHERE category_id = $catid";
    $categories = $conn->query($sqlfind);
    $getcat = $categories->fetchAll(PDO::FETCH_ASSOC);

    foreach ( $getcat as $category) { 
            
        $catid = $category['category_id'];    
        $catname = $category['category_name'];    
        $catdesc = $category['category_description'];    
    ?>

    <?php
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];

        if($method=='POST') {
        $thread_title = $_POST['thread_title'];
        $thread_description = $_POST['thread_description'];
        $sqlins = "INSERT INTO threads (thread_title, thread_description, thread_cat_id, thread_user_id) VALUES ('$thread_title', '$thread_description', '$catid', '$session') ";
        $conn->exec($sqlins);
        $showAlert = true;

        if($showAlert) {
            echo '<div class="successalert">You Successfully Created A New Discussion! Now Wait For People To Respond!</div>';
        }
    }
    ?>
    
    <section>
        <div class="forumcontainer">
            <h1 class="forumheading">Welcome To The '<?php echo $catname ?>' Forum!</h1><br><br>
            <p class="forumtext"><?php echo $catdesc ?></p><br>
        </div>

        <?php
            }
        ?>
    </section>

    <section>
        <div class="browsecat">
            <h2 class="threadheading">Browse Threads</h2>
        </div>
            
    <?php

    $catid = $_GET['catid'];

    $sqlqs = "SELECT * FROM threads WHERE thread_cat_id = $catid";
    $threads= $conn->query($sqlqs);
    $gethread = $threads->fetchAll(PDO::FETCH_ASSOC);
    $noResult = true;

    foreach ( $gethread as $thread) { 
        $noResult = false;
        $tid = $thread['thread_id'];    
        $title = $thread['thread_title'];    
        $description = $thread['thread_description'];    

    ?>
        <div>
            <h3 class="threadtitle"><a href="threadlist.php?threadid=<?php echo $tid?> "><?php echo $title?></h3></a>
            <p class="threadesc"><?php echo $description?></p><br>
        </div>

        <?php
            }
            if($noResult) { ?>
                <div class="noresultcontainer">
                    <h1 class="noresulthead">No Threads Found.</h1>
                    <p class="noresulttext">Be The First To Start A Discussion!</p>
                </div>

        <?php
            }
        ?>
      
    </section>

    <div class="threadcreate">
        <h2>Start A Discussion</h2><br>
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data">
            <label for="threadtitle" class="threadelem">Enter Your Question</label><br>
                <br><input type="text" name="thread_title" class="threadeleme" autocomplete="off"><br>
                <small>Please Keep Your Question/Title Short</small><br>
        <br>

            <label for="threaddesc" class="threadelem">Add A Short Description For Others To Understand Your Question</label><br>
            <br><textarea name="thread_description" class="threadeleme" autocomplete="off"></textarea><br>
            <small>Please Keep Your Description Short</small><br><br>

            <button type="submit" class="threadsubmit" name="discsubmit">Submit</button>
        
        </form>
    </div>
  

</body>
</html>