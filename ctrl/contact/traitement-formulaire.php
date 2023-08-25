<?php
session_start();
error_reporting(E_ALL);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/phpmailer/phpmailer/src/Exception.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/phpmailer/phpmailer/src/SMTP.php');



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host       = 'sandbox.smtp.mailtrap.io';
    $mail->Port       = 2525;
    $mail->SMTPAuth   = true;
    $mail->Username   = 'cc459042404381'; // Your Gmail address
    $mail->Password   = '9c721b67a8bdd6'; // Your Gmail password

    $email = htmlspecialchars($this->inputs['email']);
    $name = htmlspecialchars($this->inputs['name']);
    $subject = htmlspecialchars($this->inputs['subject']);
    $message = htmlspecialchars($this->inputs['message']);

    $mail->setFrom($this->inputs ['email'], $name);
    $mail->addAddress('sanae.choko@gmail.com', 'AthenaTech');
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = "
        <p><strong>Vous avez recu un message de : ".$email."</p>
        <p><strong>Nom :</strong> ".$name."</p>
        <p><strong>Sujet :</strong> ".$subject."</p>
        <p><strong>Message :</strong> ".$message."</p>
    ";
    $mail->setLanguage('fr', '/optional/path/to/language/directory/');

    $mail->send();
    $_SESSION['msg_success'] = "Le courriel a été envoyé avec succès.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);

} catch (Exception $e) {
    $erreur = "Une erreur s'est produite : " . $mail->ErrorInfo;
    $_SESSION['msg_error'] = $erreur;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
