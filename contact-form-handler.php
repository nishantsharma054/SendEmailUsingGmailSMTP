<?php

//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Form Data
$myemail = '';//<-----Put Your email address here.

$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$sender_email_address = $_REQUEST['email'];
$jobTitle = $_REQUEST['jobTitle'];
$phone = $_REQUEST['phone'];
$companyName = $_REQUEST['companyName'];
$city = $_REQUEST['city'];
$message = $_REQUEST['message'];

$name = $firstName.' '.$lastName; 

$email_subject = "Contact form submission from $name";


$email_body = "<h2>You've received a new message from:</h2>".
"<table style='width:60%;  border: 1px solid black;border-collapse: collapse;'>".
  "<tr>".
    "<th style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>Name:</th>".
    "<td style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>$name</td>".
  "</tr>".
  "<tr>".
    "<th style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>Email:</th>".
    "<td style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>$sender_email_address</td>".
  "</tr>".
  "<tr>".
    "<th style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>Job Title:</th>".
    "<td style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>$jobTitle</td>".
  "</tr>".
  "<tr>".
    "<th style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>Phone:</th>".
    "<td style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>$phone</td>".
  "</tr>".
  "<tr>".
    "<th style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>Company:</th>".
    "<td style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>$companyName</td>".
  "</tr>".
  "<tr>".
    "<th style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>City:</th>".
    "<td style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>$city</td>".
  "</tr>".
  "<tr>".
    "<th style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>Message:</th>".
    "<td style='padding: 5px;text-align: left;border: 1px solid black;border-collapse:collapse;'>$message</td>".
  "</tr>".
"</table>";

// echo '<pre>';
// print_r($email_body);
// die;

//Create instance of PHPMailer
$mail = new PHPMailer();
//Set mailer to use smtp
$mail->isSMTP();
//Define smtp host
$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "ssl";
//Port to connect smtp
$mail->Port = 465;
//Set gmail username
$mail->Username = $myemail;
//Set gmail password
$mail->Password = ""; // <----- Put Your Gmail password here
//Email subject
$mail->Subject = $email_subject;
//Set sender email
$mail->setFrom($sender_email_address);
//Enable HTML
$mail->isHTML(true);
//Email body
$mail->Body = $email_body;
//Add recipient
$mail->addAddress($myemail);

//Finally send email
if ( $mail->send() ) {
  // echo "Email Sent..!";
  $status = 'success';
}else{
  $status = 'failed';
  // echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
}
//Closing smtp connection
$mail->smtpClose();
echo $status;

//  Also, you can create and redirect to the 'thank you' page
// header('Location: contact-form-thank-you.html');

?>