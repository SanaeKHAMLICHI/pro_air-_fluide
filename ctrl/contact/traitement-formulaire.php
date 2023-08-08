<?php
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

    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail->setFrom($_POST ['email'], $name);
    $mail->addAddress('sanae.choko@gmail.com', 'AthenaTech');
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = "
        <p>Vous avez reçu un message de : ".$email."</p>
        <p><strong>Nom :</strong> ".$name."</p>
        <p><strong>Sujet :</strong> ".$subject."</p>
        <p><strong>Message :</strong> ".$message."</p>
    ";
    $mail->setLanguage('fr', '/optional/path/to/language/directory/');

    $mail->send();
    header('Location: ' . $_SERVER['HTTP_REFERER']);

} catch (Exception $e) {
    echo "Une erreur s'est produite : " . $mail->ErrorInfo;
}
