<?php

include '../connection/dbconnect.php';
session_start();

$geteditcat = $conn->prepare("SELECT * FROM categories WHERE category_id = " . $_GET["category_id"]);
$geteditcat->execute();
$editresult = $geteditcat->fetchAll();

// edit category 
if(isset($_POST["editcategory"])) {

    $editcategory = $conn->prepare("UPDATE categories SET category_name='" . $_POST[ 'category_name' ] . "', 
    category_description='" . $_POST[ 'category_description' ]. "'
    WHERE category_id=" . $_GET["category_id"]);

	$addeditcat = $editcategory->execute();

    if($addeditcat) {
        echo '<script type="text/javascript">alert("Category Updated Successfully");window.location.assign("manageforum.php");</script>';
	}else{
        function function_alert($message) {
			echo "<script>alert('$message');</script>";
		}
		function_alert("Database unavailable. Try again later.");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../CSS/dashboardstyle.css">
    <title>Educatic | Add Category</title>
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
        <div class="match_header">
            <h4>Edit Forum Category</h4>

            

        </div>
        <form name="categoryForm" action="" method="POST" class="addcategory">

                <label>Category Name:</label><br>
                <input type="text" name="category_name" class="nameinput" value="<?php echo $editresult[0]['category_name']; ?>" required="required"><br>


                <br><label>Category Description:</label><br>
                <textarea name="category_description" rows="5" cols="40" required="required"><?php echo $editresult[0]['category_description']; ?></textarea><br>


                <br><input name="editcategory" type="submit" value="Edit Category" class="submitcategory">


            </form>
    </div>

</body>
</html>


