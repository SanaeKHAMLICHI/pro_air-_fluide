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

        $fullname = $this->inputs['fullname'];
        $adresse = $this->inputs['adresse'];
        $complement = $this->inputs['complement']; 
        $code_postale = $this->inputs['code_postale'];
        $ville = $this->inputs['ville'];
        $pays = $this->inputs['pays'];
        $telephone = $this->inputs['telephone'];




        // Créé l'Utilisateur
        LibAddress::create($fullname, $adresse, $complement, $code_postale, $ville, $pays , $telephone, $idUser);

        // Redirige l'Utilisateur vers la liste des Utilisateurs
        header('Location: /cart/validation');
    }

    /** @Override */
    function getView()
    {
        return null;
    }
}

$ctrl = new newAdress();
$ctrl->execute();
