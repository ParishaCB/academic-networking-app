<?php
session_start();
?>
<?php
include_once('./connection/dbconnect.php');

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $user_password = $_POST['user_password'];
    $hash = password_hash($user_password, PASSWORD_BCRYPT);
    $filename = $_FILES['user_profile']['name'];
    $tempname = $_FILES['user_profile']['tmp_name'];
    $folder = 'userprofiles/'.$filename;
    move_uploaded_file($tempname,$folder);
    $user_age = $_POST['user_age'];
    $user_gender = $_POST['user_gender'];
    $user_nationality = $_POST['user_nationality'];
    $user_education = $_POST['user_education'];
    $user_school = $_POST['user_school'];
    $user_course = $_POST['user_course'];
    $user_interest_one = $_POST['user_interest_one'];
    $user_interest_two = $_POST['user_interest_two'];
    $user_interest_three = $_POST['user_interest_three'];
    $user_interest_four = $_POST['user_interest_four'];
    $user_project = $_POST['user_project'];
    $emailstatus=0;
    $activationcode=md5($email.time()); 

    $sql = "INSERT INTO useraccounts (first_name, last_name, email, user_password, user_profile, user_age, user_gender, user_nationality, user_education, user_school, user_course,
    user_interest_one, user_interest_two, user_interest_three, user_interest_four, user_project, activationcode, emailstatus)VALUES('$first_name', '$last_name', '$email', '$hash', '$folder', 
    '$user_age', '$user_gender', '$user_nationality', '$user_education', '$user_school', '$user_course', '$user_interest_one', '$user_interest_two', '$user_interest_three',
    '$user_interest_four', '$user_project', '$activationcode', '$emailstatus')"; 
    $conn->exec($sql);
    $lastInsertId = $conn->lastInsertId();
    if($lastInsertId) {
        $to=$email;
        $headers = '';
        $ms = '';
        $msg= "New Educatic Account Registration";   
        $subject="Email Verification";
        $headers .= "MIME-Version: 1.0"."\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $headers .= 'From: Educatic | Networking Made Easy <communications@educatic.com>'."\r\n"; 

        $ms.="<html></body><div><div>Dear $first_name,</div></br></br>";
        $ms.="<div style='padding-top:8px;'>Please Click The Following Link To Verify & Activate Your Account:</div>
        <div style='padding-top:10px;'><a href='http://educaticnetworking.000webhostapp.com/email/email_verification.php?code=$activationcode'>Click Here</a></div> 
        </body></html>";
        mail($to,$subject,$ms,$headers);
        echo "<script>window.open('https://educaticnetworking.000webhostapp.com/email/emailverifysuccess.php', '_self')</script>";;
    }else{
        echo "<script>window.open('https://educaticnetworking.000webhostapp.com/email/emailverifyfail.php', '_self')</script>";;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="./media/favicon.png"/>
    <link rel="stylesheet" href="./CSS/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Educatic | Register</title>
</head>

<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">

<section>
        <header>    
            <div class="headercontainer">
                <div class="headerlogo">
                    <a href="./index.php"><img src="./media/logo.png" alt="EducaticLogo"></a>
                </div>
        </header>

        <div>
            <ul>
                <li><a href="index.php" class="alreadyaccount">Already Have An Account? Login Here.</a></li>
            </ul>
        </div>
    </section>

    <!-- the form progress bar -->
    <div class="container">
            <header>Create Your Educatic Account!</header>
            <div class="progress-bar">
                <div class="step">
                    <p>Your Details</p>
                    <div class="bullet">
                        <span>1</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Account</p>
                    <div class="bullet">
                        <span>2</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>About You</p>
                    <div class="bullet">
                        <span>3</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Education</p>
                    <div class="bullet">
                        <span>4</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Interests</p>
                    <div class="bullet">
                        <span>5</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Projects</p>
                    <div class="bullet">
                        <span>6</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Submit</p>
                    <div class="bullet">
                        <span>7</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
            </div>

            <!-- the first page -->
            <div class="form-outer">
                <form action="#" method="POST" enctype="multipart/form-data" id="regForm"> 
                    <div class="page slide-page">
                        <div class="title">Your Details:</div>
                        <div class="field">
                            <div class="label">First Name *</div>
                            <input type="text" name="first_name" id="firstname" required autocomplete="off" />
                        </div>
                        <div class="field">
                            <div class="label">Last Name *</div>
                            <input type="text" name="last_name" id="lastname" required autocomplete="off" />
                        </div>
                        <div class="field">
                            <button class="firstNext next">Next</button>
                        </div>
                    </div>
            
                    <!-- the second page -->

                    <div class="page">
                        <div class="title">Your Account:</div>
                        <div class="field">
                            <div class="label">University Email Address *</div>
                            <input type="email"  name="email" id="email" required autocomplete="off" />
                        </div>
                        <div class="field">
                            <div class="label">Enter A Password * (Your Password Must Be Minimum 8 Characters)</div>
                            <input type="password"  id="password" name="user_password" required autocomplete="off" />
                        </div>
                        <div class="field">
                            <div class="label">Re-Enter Your Password *</div>
                            <input type="password"  id="cpassword" name="repeat_password" required />
                        </div>
                        <div class="field btns">
                            <button class="prev-2 prev">Previous</button>
                            <button class="next-2 next">Next</button>
                        </div>
                    </div>

                    <!-- the third page -->
                    <div class="page">
                        <div class="title">About You:</div>
                        <div class="field">
                            <div class="label">Upload A Profile Picture *</div>
                            <input type="file" name="user_profile" required />
                        </div>
                        <div class="field">
                            <div class="label">Enter Your Age *</div>
                            <input type="text" id="userage" name="user_age" required autocomplete="off" />
                        </div>
                        <div class="field">
                            <div class="label">Select Your Gender *</div>
                            <select name="user_gender" required>
                                <option value="Null"></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="field">
                            <div class="label">Select Your Nationality *</div>
                            <select name="user_nationality" required>
                                <option value="Null"></option>
                                <option value="Afghan">Afghan</option>
                                <option value="Albanian">Albanian</option>
                                <option value="Algerian">Algerian</option>
                                <option value="American">American</option>
                                <option value="Andorran">Andorran</option>
                                <option value="Angolan">Angolan</option>
                                <option value="Antiguans">Antiguans</option>
                                <option value="Argentinean">Argentinean</option>
                                <option value="Armenian">Armenian</option>
                                <option value="Australian">Australian</option>
                                <option value="Austrian">Austrian</option>
                                <option value="Azerbaijani">Azerbaijani</option>
                                <option value="Bahamian">Bahamian</option>
                                <option value="Bahraini">Bahraini</option>
                                <option value="Bangladeshi">Bangladeshi</option>
                                <option value="Barbadian">Barbadian</option>
                                <option value="Barbudans">Barbudans</option>
                                <option value="Batswana">Batswana</option>
                                <option value="Belarusian">Belarusian</option>
                                <option value="Belgian">Belgian</option>
                                <option value="Belizean">Belizean</option>
                                <option value="Beninese">Beninese</option>
                                <option value="Bhutanese">Bhutanese</option>
                                <option value="Bolivian">Bolivian</option>
                                <option value="Bosnian">Bosnian</option>
                                <option value="Brazilian">Brazilian</option>
                                <option value="British">British</option>
                                <option value="Bruneian">Bruneian</option>
                                <option value="Bulgarian">Bulgarian</option>
                                <option value="Burkinabe">Burkinabe</option>
                                <option value="Burmese">Burmese</option>
                                <option value="Burundian">Burundian</option>
                                <option value="Cambodian">Cambodian</option>
                                <option value="Cameroonian">Cameroonian</option>
                                <option value="Canadian">Canadian</option>
                                <option value="Cape Verdean">Cape Verdean</option>
                                <option value="Central African">Central African</option>
                                <option value="Chadian">Chadian</option>
                                <option value="Chilean">Chilean</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Colombian">Colombian</option>
                                <option value="Comoran">Comoran</option>
                                <option value="Congolese">Congolese</option>
                                <option value="Costa Rican">Costa Rican</option>
                                <option value="Croatian">Croatian</option>
                                <option value="Cuban">Cuban</option>
                                <option value="Cypriot">Cypriot</option>
                                <option value="Czech">Czech</option>
                                <option value="Danish">Danish</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominican">Dominican</option>
                                <option value="Dutch">Dutch</option>
                                <option value="East Timorese">East Timorese</option>
                                <option value="Ecuadorean">Ecuadorean</option>
                                <option value="Egyptian">Egyptian</option>
                                <option value="Emirian">Emirian</option>
                                <option value="Equatorial Guinean">Equatorial Guinean</option>
                                <option value="Eritrean">Eritrean</option>
                                <option value="Estonian">Estonian</option>
                                <option value="Ethiopian">Ethiopian</option>
                                <option value="Fijian">Fijian</option>
                                <option value="Filipino">Filipino</option>
                                <option value="Finnish">Finnish</option>
                                <option value="French">French</option>
                                <option value="Gabonese">Gabonese</option>
                                <option value="Gambian">Gambian</option>
                                <option value="Georgian">Georgian</option>
                                <option value="German">German</option>
                                <option value="Ghanaian">Ghanaian</option>
                                <option value="Greek">Greek</option>
                                <option value="Grenadian">Grenadian</option>
                                <option value="Guatemalan">Guatemalan</option>
                                <option value="Guinea-Bissauan">Guinea-Bissauan</option>
                                <option value="Guinean">Guinean</option>
                                <option value="Guyanese">Guyanese</option>
                                <option value="Haitian">Haitian</option>
                                <option value="Herzegovinian">Herzegovinian</option>
                                <option value="Honduran">Honduran</option>
                                <option value="Hungarian">Hungarian</option>
                                <option value="I-Kiribati">I-Kiribati</option>
                                <option value="Icelander">Icelander</option>
                                <option value="Indian">Indian</option>
                                <option value="Indonesian">Indonesian</option>
                                <option value="Iranian">Iranian</option>
                                <option value="Iraqi">Iraqi</option>
                                <option value="Irish">Irish</option>
                                <option value="Israeli">Israeli</option>
                                <option value="Italian">Italian</option>
                                <option value="Ivorian">Ivorian</option>
                                <option value="Jamaican">Jamaican</option>
                                <option value="Japanese">Japanese</option>
                                <option value="Jordanian">Jordanian</option>
                                <option value="Kazakhstani">Kazakhstani</option>
                                <option value="Kenyan">Kenyan</option>
                                <option value="Kittian and Nevisian">Kittian and Nevisian</option>
                                <option value="Kuwaiti">Kuwaiti</option>
                                <option value="Kyrgyz">Kyrgyz</option>
                                <option value="Laotian">Laotian</option>
                                <option value="Latvian">Latvian</option>
                                <option value="Lebanese">Lebanese</option>
                                <option value="Liberian">Liberian</option>
                                <option value="Libyan">Libyan</option>
                                <option value="Liechtensteiner">Liechtensteiner</option>
                                <option value="Lithuanian">Lithuanian</option>
                                <option value="Luxembourger">Luxembourger</option>
                                <option value="Macedonian">Macedonian</option>
                                <option value="Malagasy">Malagasy</option>
                                <option value="Malawian">Malawian</option>
                                <option value="Malaysian">Malaysian</option>
                                <option value="Maldivan">Maldivan</option>
                                <option value="Malian">Malian</option>
                                <option value="Maltese">Maltese</option>
                                <option value="Marshallese">Marshallese</option>
                                <option value="Mauritian">Mauritian</option>
                                <option value="Mexican">Mexican</option>
                                <option value="Micronesian">Micronesian</option>
                                <option value="Moldovan">Moldovan</option>
                                <option value="Monacan">Monacan</option>
                                <option value="Mongolian">Mongolian</option>
                                <option value="Moroccan">Moroccan</option>
                                <option value="Mosotho">Mosotho</option>
                                <option value="Motswana">Motswana</option>
                                <option value="Mozambican">Mozambican</option>
                                <option value="Namibian">Namibian</option>
                                <option value="Nauruan">Nauruan</option>
                                <option value="Nepalese">Nepalese</option>
                                <option value="Netherlander">Netherlander</option>
                                <option value="New Zealanders">New Zealander</option>
                                <option value="Ni-Vanuatu">Ni-Vanuatu</option>
                                <option value="Nicaraguan">Nicaraguan</option>
                                <option value="Nigerian">Nigerian</option>
                                <option value="North Korean">North Korean</option>
                                <option value="Northern Irish">Northern Irish</option>
                                <option value="Norwegian">Norwegian</option>
                                <option value="Omani">Omani</option>
                                <option value="Pakistani">Pakistani</option>
                                <option value="Palauan">Palauan</option>
                                <option value="Panamanian">Panamanian</option>
                                <option value="Papua New Guinean">Papua New Guinean</option>
                                <option value="Paraguayan">Paraguayan</option>
                                <option value="Peruvian">Peruvian</option>
                                <option value="Polish">Polish</option>
                                <option value="Portuguese">Portuguese</option>
                                <option value="Qatari">Qatari</option>
                                <option value="Romanian">Romanian</option>
                                <option value="Russian">Russian</option>
                                <option value="Rwandan">Rwandan</option>
                                <option value="Saint Lucian">Saint Lucian</option>
                                <option value="Salvadoran">Salvadoran</option>
                                <option value="Samoan">Samoan</option>
                                <option value="San Marinese">San Marinese</option>
                                <option value="Sao Tomean">Sao Tomean</option>
                                <option value="Saudi">Saudi</option>
                                <option value="Scottish">Scottish</option>
                                <option value="Senegalese">Senegalese</option>
                                <option value="Serbian">Serbian</option>
                                <option value="Seychellois">Seychellois</option>
                                <option value="Sierra Leonean">Sierra Leonean</option>
                                <option value="Singaporean">Singaporean</option>
                                <option value="Slovakian">Slovakian</option>
                                <option value="Slovenian">Slovenian</option>
                                <option value="Somali">Somali</option>
                                <option value="South African">South African</option>
                                <option value="South Korean">South Korean</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Sri Lankan">Sri Lankan</option>
                                <option value="Sudanese">Sudanese</option>
                                <option value="Surinamer">Surinamer</option>
                                <option value="Swazi">Swazi</option>
                                <option value="Swedish">Swedish</option>
                                <option value="Swiss">Swiss</option>
                                <option value="Syrian">Syrian</option>
                                <option value="Taiwanese">Taiwanese</option>
                                <option value="Tajik">Tajik</option>
                                <option value="Tanzanian">Tanzanian</option>
                                <option value="Thai">Thai</option>
                                <option value="Togolese">Togolese</option>
                                <option value="Tongan">Tongan</option>
                                <option value="Trinidadian or Tobagonian">Trinidadian or Tobagonian</option>
                                <option value="Tunisian">Tunisian</option>
                                <option value="Turkish">Turkish</option>
                                <option value="Tuvaluan">Tuvaluan</option>
                                <option value="Ugandan">Ugandan</option>
                                <option value="Ukrainian">Ukrainian</option>
                                <option value="Uruguayan">Uruguayan</option>
                                <option value="Uzbekistani">Uzbekistani</option>
                                <option value="Venezuelan">Venezuelan</option>
                                <option value="Vietnamese">Vietnamese</option>
                                <option value="Welsh">Welsh</option>
                                <option value="Yemenite">Yemenite</option>
                                <option value="Zambian">Zambian</option>
                                <option value="Zimbabwean">Zimbabwean</option>
                            </select>
                        </div>
                        <div class="field btns">
                            <button class="prev-3 prev">Previous</button>
                            <button class="next-3 next">Next</button>
                        </div>
                    </div>

                    <!-- the fourth page -->
                    <div class="page">
                        <div class="title">Education Details:</div>
                        <div class="field">
                            <div class="label">Your Education Level *</div>
                            <select name="user_education" required>
                                <option value="Null"></option>
                                <option value="Undergraduate">Undergraduate</option>
                                <option value="Postgraduate">Postgraduate</option>
                            </select>
                        </div>
                        <div class="field">
                            <div class="label">Your School *</div>
                            <select name="user_school" required>
                                <option value="Null"></option>
                                <option value="Engineering">School of Engineering</option>
                            </select>
                        </div>
                        <div class="field">
                            <div class="label">Your Course *</div>
                            <select name="user_course" required>
                                <option value="Null"></option>
                                <option value="Advanced Vehicle Engineering">Advanced Vehicle Engineering</option>
                                <option value="Building Services Engineering">Building Services Engineering</option>
                                <option value="Chemical and Energy Engineering">Chemical and Energy Engineering</option>
                                <option value="Chemical Engineering">Chemical Engineering</option>
                                <option value="Civil Engineering">Civil Engineering</option>
                                <option value="Electrical and Electronic Engineering">Electrical and Electronic Engineering</option>
                                <option value="Electrical Power Engineering">Electrical Power Engineering</option>
                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Information Technology">Information Technology</option>
                            </select>
                        </div>
                        <div class="field btns">
                            <button class="prev-4 prev">Previous</button>
                            <button class="next-4 next">Next</button>
                        </div>
                    </div>

                    <!-- the fifth page -->
                    <div class="page">
                        <div class="title">Select Your Interests:</div>
                        <div class="field">
                            <div class="label">Select A First Interest *</div>
                            <select name="user_interest_one" required>
                                <option value="Null">----</option>
                                <option value="Animals">Animals</option>
                                <option value="Arts and Crafts">Arts and Crafts</option>
                                <option value="Blogging">Blogging</option>
                                <option value="Coding">Coding</option>
                                <option value="Cooking">Cooking</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Gardening">Gardening</option>
                                <option value="Photography">Photography</option>
                                <option value="Reading">Reading</option>
                                <option value="Sports">Sports</option>
                                <option value="Travelling">Travelling</option>
                                <option value="Writing">Writing</option>
                                <option value="Volunteering">Volunteering</option>
                                <option value="Yoga">Yoga</option>
                            </select>
                        </div>
                        <div class="field">
                            <div class="label">Select A Second Interest *</div>
                            <select name="user_interest_two" required>
                                <option value="Null">----</option>
                                <option value="Animals">Animals</option>
                                <option value="Arts and Crafts">Arts and Crafts</option>
                                <option value="Blogging">Blogging</option>
                                <option value="Coding">Coding</option>
                                <option value="Cooking">Cooking</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Gardening">Gardening</option>
                                <option value="Photography">Photography</option>
                                <option value="Reading">Reading</option>
                                <option value="Sports">Sports</option>
                                <option value="Travelling">Travelling</option>
                                <option value="Writing">Writing</option>
                                <option value="Volunteering">Volunteering</option>
                                <option value="Yoga">Yoga</option>
                            </select>
                        </div>
                        <div class="field">
                            <div class="label">Select A Third Interest *</div>
                            <select name="user_interest_three" required>
                                <option value="Null">----</option>
                                <option value="Animals">Animals</option>
                                <option value="Arts and Crafts">Arts and Crafts</option>
                                <option value="Blogging">Blogging</option>
                                <option value="Coding">Coding</option>
                                <option value="Cooking">Cooking</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Gardening">Gardening</option>
                                <option value="Photography">Photography</option>
                                <option value="Reading">Reading</option>
                                <option value="Sports">Sports</option>
                                <option value="Travelling">Travelling</option>
                                <option value="Writing">Writing</option>
                                <option value="Volunteering">Volunteering</option>
                                <option value="Yoga">Yoga</option>
                            </select>
                        </div>
                        <div class="field">
                            <div class="label">Select A Fourth Interest *</div>
                            <select name="user_interest_four" required>
                                <option value="Null">----</option>
                                <option value="Animals">Animals</option>
                                <option value="Arts and Crafts">Arts and Crafts</option>
                                <option value="Blogging">Blogging</option>
                                <option value="Coding">Coding</option>
                                <option value="Cooking">Cooking</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Gardening">Gardening</option>
                                <option value="Photography">Photography</option>
                                <option value="Reading">Reading</option>
                                <option value="Sports">Sports</option>
                                <option value="Travelling">Travelling</option>
                                <option value="Writing">Writing</option>
                                <option value="Volunteering">Volunteering</option>
                                <option value="Yoga">Yoga</option>
                            </select>
                        </div>
                        <div class="field btns">
                            <button class="prev-5 prev">Previous</button>
                            <button class="next-5 next">Next</button>
                        </div>
                    </div>

                        <!-- the sixth page -->
                        <div class="page">
                        <div class="title">Personal Project Details:</div>
                        <div class="field">
                            <div class="label">List Any Projects You May Be Working On: (Optional)</div>
                            <input type="text" name="user_project" autocomplete="off" />
                        </div>
                        <div class="field btns">
                            <button class="prev-6 prev">Previous</button>
                            <button class="next-6 next">Next</button>
                        </div>
                    </div>

                    <!-- the seventh page -->
                    <div class="page">
                        <div class="title">Final Step:</div>
                        <div class="field">
                            <label for="terms" class="label">Check To Indicate That You Agree To Our <a href="./terms/tandc.html">Terms & Conditions</a></label>
                            <input type="checkbox" class="checkboxx" name="terms" required />
                        </div>
                        <div class="field btns">
                            <button class="prev-7 prev">Previous</button>
                            <button class="submit" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="./JS/registerscript.js"></script>
        <script src="./JS/validate.js"></script>

        <script>
            var myVar;
            
            function myFunction() {
            myVar = setTimeout(showPage, 1000);
            }
            
            function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
            }
        </script>
    </body>
</html>




