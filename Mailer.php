<?php
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '..\vendor\phpmailer\phpmailer\src\Exception.php';
require '..\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require '..\vendor\phpmailer\phpmailer\src\SMTP.php';

print_r($_POST);


function envoi_mail ($from_name,$from_email,$subject,$message) {

    $mailer = new PHPMailer();
    $mailer->isSMTP();
    $mailer->SMTPDebug = 0;
    $mailer->SMTPSecure = 'SSL';
    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = "kbecode@gmail.com";
    $mailer->Password = "igouhbfglfpkcxlk";
    $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mailer->Port = 465;

    $mailer->setFrom($from_name,$from_email);
    $mailer->addAddress('kbecode@gmail.com','Restau2');
    $mailer->isHTML(true);
    $mailer->Subject = $subject;
    $mailer->Body = $message;
    $mailer->send();

    if ($mailer->send()) {
        return true;
    } else {
    return false;
    }

    
}

if (envoi_mail($_POST['name'],$_POST['email'],$_POST['subject'],$_POST['message'])) {
    echo 'OK';
    } else {
    echo 'Il y a eu une erreur';
    }

envoi_mail($_POST['name'],$_POST['email'],$_POST['subject'],$_POST['message']);



 

