<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../media/favicon.png"/>
    <link rel="stylesheet" href="../CSS/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Educatic | New Password</title>
</head>

<body>
    <section>
        <header>    
            <div class="headercontainer">
                <div class="headerlogo">
                    <a href="../index.php"><img src="../media/logo.png" alt="EducaticLogo"></a>
                </div>
        </header>
    </section>

    <form class="login" action="" method="POST" enctype="multipart/form-data">
		<h2 class="login_title">Change Your Password</h2><br>
		<div class="login_info">
			<label>Enter Your New Password</label><br><br>
			<input type="password" name="new_user_password" autocomplete="off" placeholder="Enter A New Password"><br>

            <label>Confirm Your New Password</label><br><br>
			<input type="password" name="c_user_password" autocomplete="off" placeholder="Re-Enter Your NewPassword">
		</div>
		<div class="login_info">
			<br><button type="submit" name="change_password" class="reset_butn">Submit</button>
		</div>
	</form>
</body>
</html>