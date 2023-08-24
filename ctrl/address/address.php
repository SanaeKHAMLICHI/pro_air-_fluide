<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/address/address.php');

use Monolog\Logger;

/** Traite le formulaire de création d'un Utilisateur. */
class newAdress extends Ctrl
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
        $idUser = $_SESSION['user']['id'];

        $fullname = $_POST['fullname'];
        $adresse = $_POST['adresse'];
        $complement = $_POST['complement']; 
        $code_postale = $_POST['code_postale'];
        $ville = $_POST['ville'];
        $pays = $_POST['pays'];
        $telephone = $_POST['telephone'];




        // Créé l'Utilisateur
        LibAddress::create($fullname, $adresse, $complement, $code_postale, $ville, $pays , $telephone, $idUser);

        // Redirige l'Utilisateur vers la liste des Utilisateurs
        header('Location: /ctrl/cart/validation.php');
    }

    /** @Override */
    function getView()
    {
        return null;
    }
}

$ctrl = new newAdress();
$ctrl->execute();
