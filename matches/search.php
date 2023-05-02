<?php
include '../connection/dbconnect.php';
session_start();

$sessionID = $_SESSION['userid'];

//get all the search options the user has selected and set variables
//connect to database and get everything from the user accounts 
if(isset($_POST['search'])) {
$user_education = $_POST['user_education'];
$user_course = $_POST['user_course'];
$user_gender = $_POST['user_gender'];
$user_interest_one = $_POST['user_interest_one'];
$user_interest_two = $_POST['user_interest_two'];
$user_interest_three = $_POST['user_interest_three'];
$user_interest_four = $_POST['user_interest_four'];

$search = $conn->prepare("SELECT * FROM useraccounts WHERE (
                        user_education LIKE '%$user_education%' AND 
                        user_course LIKE '%$user_course%' AND 
                        user_gender LIKE '%$user_gender%' AND
                        user_interest_one LIKE '%$user_interest_one%' AND
                        user_interest_two LIKE '%$user_interest_two%' AND
                        user_interest_three LIKE '%$user_interest_three%' AND
                        user_interest_four LIKE '%$user_interest_four%') AND userid<>$sessionID");
$search->execute();
$search->fetch(PDO::FETCH_ASSOC);
}
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
    <link rel="stylesheet" href="../CSS/dashboardstyle.css">
    <title>Educatic | Search</title>
</head>

<body>
    <section> 
        <header>
        <div class="headerscontainers">
            <div class="headerslogos">
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
            <li><a href="matches.php" ><i class="fas fa-user-graduate"></i> My Matches</a></li>
            <li><a href="../chats/chat.php"><i class="fas fa-envelope"></i> Messages</a></li>
            <li><a href="../forum/forum.php"><i class="fas fa-comments"></i> Forums</a></li>
            <li><a href="../editprofile/editprofile.php"><i class="fas fa-user"></i> My Account</a></li><br><br><br><br><br>
            <br><br><br><br><br><br><br><li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul> 
    </div>

     <!-- display search results if any are found here -->
    
     <div class="main_contents">
        <div class="search_header">
            <h4>Search Results</h4>
        </div>

    <?php if($search != 0) {
                foreach ( $search as $result) {?>
        
            <div class="searchcard">   
                <div class="searchcontainer">       
                <img src="/Educatic/<?php echo $result['user_profile']?>" height="200" width="200" class="scard-image"><br><br>
                <div><h2 class="scard-text1"> <?php echo $result['first_name']?> </h2></div>
                <div><h2 class="scard-text1"> <?php echo $result['last_name']?> </h2></div><br>
                <div><h2 class="scard-text"> <?php echo $result['user_education']?> </h2></div><br>
                <div><h2 class="scard-text"> <?php echo $result['user_school']?> </h2></div><br>
                <div><h2 class="scard-text"> <?php echo $result['user_course']?> </h2></div><br>
                <div><h4 class="card-interest">Their Interests:</h4></div>
                <p class="card-interest"><?php echo $result['user_interest_one']?>, <?php echo $result['user_interest_two']?>,
                 <?php echo $result['user_interest_three']?>, <?php echo $result['user_interest_four']?></p><br>
                 <div><button class="sconnectbtn"><a href="../chats/message.php?userid=<?php echo $result['userid']?> ">Connect</a></button></div>
                </div>

            </div>
        <?php }
            }elseif ($search == 0) {
                echo '<h3 class="nosearch">No Results Were Found.</h3>';
            }
        ?>
            

<script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
</body>
</html>
