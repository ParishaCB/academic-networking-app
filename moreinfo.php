<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="./media/favicon.png"/>
    <link rel="stylesheet" href="./CSS/moreinfopage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src='./JS/aboutscript.js'></script>
    <title>Educatic | About Us</title>
</head>

<body>
    <section>
        <header>    
            <div class="headercontainer">
                <div class="headerlogo">
                    <a href="moreinfo.php"><img src="./media/logo.png" alt="EducaticLogo"></a>
                </div>
                <div class="menulinks" id="myTopnav">
                    <ul>
                        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="openNav()">&#9776;</a>
                        <li><a href="#aboutcontent">About</a></li>
                        <li><a href="#featurescontent">Features</a></li>
                        <li><a href="#contactcontent">Contact</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="#aboutcontent">About</a>
                <a href="#featurescontent">Features</a>
                <a href="#contactcontent">Contact</a>
        </div>

        <div class="backgroundimage" id="backgroundfix">
            <img src="./media/img3.jpg" alt="backgroundimage">
        </div>
    </section>

    <section id="aboutcontent">
        <div class="aboutcontainer">
            <h2 class="columntext">Welcome To Educatic!</h2><br>
            <p class="columntext">An Academic Networking Tool Designed For Students At LSBU.</p>
        </div>

        <div class="aboutcontent">
            <h3>About Us...</h3><br>
            <p>Hello there &#128075; and thank you for stopping by. 
                <br><br>Here at Educatic, our mission is to encourage and promote peer-to-peer networking
                within the university. We know how hard it can be to communicate with the people around you, especially when you are new and
                are unfamiliar with a new environment. So we created Educatic. The application that allows you 
                to match with other like-minded students and find other students around campus to connect with 
                and build your network!<br><br>
                We hope you enjoy using the application as much as we enjoyed creating it!
                <br><br>Create your profile today and start connecting and growing your network today!
            </p>
        </div>
    </section>

    <section id="featurescontent">
        <div class="featurescontainer">
             <h2 class="columntext">Key Features Of Educatic</h2><br>
             <p class="columntext">Our Unique App Features Will Allow You To Easily Network With Your Peers!</p>
        </div>
            <br><br><div class="featurecards">
                <ul class="cardcontainer">
                    <li class="cyan-feature-card">
                    <h2>1. @lsbu Email Only</h2><br>
                    <p>Educatic is <strong>only</strong> for LSBU students and the email is verified upon creating your profile, so you can have peace of mind that the people you connect with 
                        are strictly based from the university! 
                    </p>
                    </li>

                    <li class="red-feature-card">
                    <h2>2. Personalised Recommendations</h2><br>
                    <p>Educatic personalises your connections and allows you to view profiles that have similar interests to yours so you 
                        can connect with like-minded people!
                    </p>
                    </li>

                    <li class="orange-feature-card">
                    <h2>4. Chat With Your Connections</h2><br>
                    <p>When you find people you want to have further conversations with, our built in messaging service simplifies this process
                        and allows you to have meaningful conversations with your peers!
                    </p>
                    </li>

                    <li class="blue-feature-card">
                    <h2>3. Profile Filtering</h2><br>
                    <p>Do you have specific people you want to connect with?  Then look no further! <br><br>
                       Our profile filtering feature allows you to refine your matches so you can be sure to find the right 
                        people to connect with!
                    </p>
                    </li>
                </ul>
            </div>
    </section>

    <br><br><section id="contactcontent">
    <div class="contactcontainer">
        <h2 class="columntext">Connect With Us!</h2><br>
        <p class="columntext">If You Have Any Questions or Are Facing Any Issues, Fill Out The Form Below & We'll Assist You!</p>
    </div>  
        <div class="row">
            <div class="column"></div>
           <div class="column">
             <form name="contactform" action="./email/message.php" method="POST" enctype="multipart/form-data"> 
                <label for="fname">First Name *</label>
                <input type="text" id="fname" name="firstname" placeholder="Enter Your First Name" required autocomplete="off">
                <label for="lname">Last Name *</label>
                <input type="text" id="lname" name="lastname" placeholder="Enter Your Last Name" required autocomplete="off">
                <label for="uemail">Email Address *</label>
                <input type="text" id="uemail" name="email" placeholder="Enter Your Email Address" required autocomplete="off">
                <label for="subject">Your Message *</label>
                <textarea id="message" name="message" placeholder="Enter Your Message" style="height:170px; resize:none;" required></textarea>
                <input type="submit" value="Submit" name="contactsubmit">
            </form>
            </div>
        </div>
    </div>
    </section>

    <section id="footer">
        <img src="./media/logo3.png" alt="EducaticLogo">
        <p>This Application Has Been Created For A University Final Year Project & Is Strictly Only For Demonstrational Purposes.<br>
            Any External Media/Text Used Has Been Referenced In The Accompanying Report For This Project.<br>
        </p>
        <p>
            <br>All Rights Reserved By Educatic | &copy; Educatic 2022
        </p><br>
        <div class="media-info">
            <li>
                <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="#"><i class="fab fa-linkedin"></i> Linkedin</a>
            </li>
        </div>
    </section>

</body>
</html>