<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prénom'];
    $email = $_POST['email'];
    $besoin = $_POST['besoin'];

    // Mettez ici votre adresse e-mail où vous souhaitez recevoir les données du formulaire
    $destinataire = 'sanae.choko@gmail.com';

    $sujet = 'Nouveau formulaire soumis';
    $message = "Nom : $nom\n";
    $message .= "Prénom : $prenom\n";
    $message .= "Email : $email\n";
    $message .= "Besoin : $besoin\n";

    // En-têtes de l'e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoyer l'e-mail
    mail($destinataire, $sujet, $message, $headers);

    // Redirection après l'envoi du formulaire (facultatif)
    header('Location: /view/contact/confirmation.php');
    exit();
}
?>
