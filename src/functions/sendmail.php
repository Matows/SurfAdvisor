<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

function sendmail($to, $user, $url) {
    global $_SMTP;

    //HTML content
    $search = ['$user', '$url'];
    $replace =[$user, $url];
    $html = file_get_contents(__DIR__ . '/../views/mail.php');
    $html = str_replace($search, $replace, $html);

    //connection serveur
    $mail = new PHPMailer();
    $mail -> isSMTP();
    $mail -> Host = $_SMTP['host'];
    $mail -> SMTPAuth = true;
    $mail -> Username = $_SMTP['username'];
    $mail -> Password = $_SMTP['password'];
    $mail -> SMTPDebug = 0;
    $mail -> SMTPAtuh = true;
    $mail -> SMTPSecure = 'tls';
    $mail -> Port = 587;
    $mail -> isHTML(true);

    //headers
    $mail -> setFrom($_SMTP['username'], 'SurfAdvisor');
    $mail -> addAddress($to, $user);

    //content
    $mail -> CharSet = 'UTF-8';
    $mail -> Subject = "Confirmer votre inscription";
    $mail -> Body = $html;

    return $mail->send();
}
