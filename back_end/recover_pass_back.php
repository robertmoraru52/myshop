<?php
require "../send_mail/PHPMailer.php";
require "../send_mail/Exception.php";
require "../send_mail/SMTP.php";
require "../back_end/connect_db.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST["submit"])){
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "localhost/myshop/front_end/create_new_pass.php?selector=" . $selector . "&validator=" . bin2hex($token);
    $expires = date("U") + 1800;

    $stmt = $conn->prepare("DELETE FROM PassReset WHERE email = :im");
    $stmt->bindParam(":im", trim($_POST["email"]));
    $stmt->execute();

    $heshedToken = password_hash($token, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO PassReset (email, selector, token, expires) VALUES (:m, :s, :t, :e)");
    $stmt->bindParam(":m", trim($_POST["email"]));
    $stmt->bindParam(":s", $selector);
    $stmt->bindParam(":t", $heshedToken);
    $stmt->bindParam(":e", $expires);
    $stmt->execute();

    $stmt = $conn->prepare("SELECT * FROM Users WHERE email = :em");
    $stmt->bindParam(":em", trim($_POST["email"]));
    $stmt->execute();
    if($stmt->rowCount() == 1){
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
        $mail->Body = "Please click here: " . $url . "to reset your password";
        $mail->addAddress(trim($_POST["email"]));
        if($mail->send()){
            header("location: ../front_end/recover_pass.php?error=success");
        }
        else{
            header("location: ../front_end/recover_pass.php?error=fail");
        }
        $mail->smtpClose();
    }
    else{
        header("location: ../front_end/recover_pass.php?error=fail");
    }
}
unset($stmt);
