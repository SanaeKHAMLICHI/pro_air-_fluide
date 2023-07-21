<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/transporter/transporter.php');

use Monolog\Logger;

/** Traite le formulaire de création d'un Utilisateur. */
class TransporterCreate extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function isRequiredUserLogged()
    {
        return true;
    }

    /** @Override */
    function getPageTitle()
    {
        return null;
    }

    /** @Override */
    function do()
    {
        // lit les données saisies dans le formulire
        $name = $_POST['name'];
        $description = $_POST['description'];
        $prix = $_POST['prix']; 
        


        // Créé l'Utilisateur
        LibTransporter::create($name, $description, $prix);

        // Redirige l'Utilisateur vers la liste des Utilisateurs
        header('Location: /ctrl/transporter/list.php');
    }

    /** @Override */
    function getView()
    {
        return null;
    }
}

$ctrl = new TransporterCreate();
$ctrl->execute();
