<?php
use phpmailer\phpmailer\PHPMailer;
use phpmailer\phpmailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'vendor/autoload.php';
include('session.php');
    try {
    //Server settings
    $mail = new PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    //$mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = 'sharemate.in@gmail.com';
    $mail->Password = 'sharematespartans';
    $type = $_POST["doc"];
    // if($type=='doctor')
        // $_SESSION["type"]=$type;
    // else if($type=='patient')
    //     $_SESSION["type"]='patient';
    //Recipients
    $mail->setFrom('abc@gmail.com');
    $mail->addAddress(''.$_POST["email"].'');
    // echo $_POST["email"];
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Invitation to '.$_POST["email"].'';
    $mail->Body    = 'http://localhost/HealthQo/signup.php?q1='. $login_session_1.'&q2='.$_POST["type"].'&q3='. $type.'';
    // echo $mail->Body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    console.log('Message has been sent');
    header('location:main.php');
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


?>
