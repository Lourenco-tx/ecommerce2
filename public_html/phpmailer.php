<?php

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "lourenco.tx@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "etn14025";

//Set who the message is to be sent from
$mail->setFrom('lourenco.tx@gmail.com', 'Lourenco');

//Set an alternative reply-to address
$mail->addReplyTo('lourenco.tx@gmail.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('lourenco.tx@gmail.com', 'John Doe');

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');





$from = "contato@webbin.com.br";
 
$to = "lourenco.tx@gmail.com";
 
$subject = "Verificando o correio do PHP";
 
$message = msgHTML(file_get_contents('contents.html'), __DIR__);
 
$headers = "De:". $from;
 
mail($to, $subject, $message, $headers);




//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

?>