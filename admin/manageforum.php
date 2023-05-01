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
    <title>Educatic | Forum Categories</title>
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
            <h4>Manage Forum Categories</h4>
             <a href="addcategory.php" class="categorybutton" title="Add Category">Create Category</a>

             <table class="maintable">
		        <thead>
                    <tr>
                        <th class="maintable-header">Category ID</th>
                        <th class="maintable-header">Category Name</th>
                        <th class="maintable-header">Category Description</th>
                        <th class="maintable-header">Actions</th>
			        </tr>
		        </thead> 

                <?php
                    $admingetcat = $conn->prepare("SELECT * FROM categories ORDER BY category_id ASC");
                    $admingetcat->execute();
			        $admincatresult = $admingetcat->fetchAll();
                ?>

                <tbody id="table-body">
                        <?php
                        if(!empty($admincatresult)) { 
                            foreach($admincatresult as $admincatrow) {
                        ?>
                        <tr class="maintable-row">
                            <td><?php echo $admincatrow["category_id"]; ?></td>
                            <td class="adjust"><?php echo $admincatrow["category_name"]; ?></td>
                            <td class="adjust"><?php echo $admincatrow["category_description"]; ?></td>
                            <td><a class="edit2" href='editcategory.php?category_id=<?php echo $admincatrow['category_id']; ?>'>Edit</a>
                            <a class="delete" onclick="return confirm('Are You Sure You Want To Delete?')" href='deletecategory.php?category_id=<?php echo $admincatrow['category_id']; ?>'>Delete</a></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>


