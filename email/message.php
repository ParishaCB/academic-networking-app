<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $email_from = 'communications@Educatic.com';

    $email_subject = "New Contact Form Submission";

    $email_body = "User First Name: $firstname.\n".
                    "User Last Name: $lastname.\n".
                        "User Email: $email.\n".
                             "User Message: $message.\n".


    $to = "parishab112@gmail.com";

    $headers = "From: $email_from \r\n";

    $headers = "Reply-To: $email \r\n";

    mail($to,$email_subject,$email_body,$headers);

    header("Location: ../thanks.html");

?>

