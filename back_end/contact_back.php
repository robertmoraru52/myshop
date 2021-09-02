<?php
require "connect_db.php";


require "../send_mail/PHPMailer.php";
require "../send_mail/Exception.php";
require "../send_mail/SMTP.php";
require "../back_end/connect_db.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST["submit"])){
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.mailtrap.io";
    $mail->SMTPAuth = "PLAIN, LOGIN and CRAM-MD5";
    $mail->SMTPSecure = "Optional (STARTTLS on all ports)";
    $mail->Port = "465";
    $mail->Username = "5003fff4978aa4";
    $mail->Password = "e107030e8525ed";
    $mail->Subject = "Test mail using phpmailer";
    $mail->setFrom("myshop@gmail.com");
    $mail->Body = $_POST["comment"];
    $mail->addAddress(trim($_POST["email"]));
    if($mail->send()){
        header("location: ../front_end/contact.php?error=success");
    }
    else{
        header("location: ../front_end/contact.php?error=fail");
    }
    $mail->smtpClose();
}
else{
    header("location: ../front_end/contact.php?error=fail");
}

unset($stmt);
