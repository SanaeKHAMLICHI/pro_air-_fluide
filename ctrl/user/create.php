<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/user/user.php');

use Monolog\Logger;

/** Traite le formulaire de création d'un Utilisateur. */
class UserCreate extends Ctrl
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
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $idRole = $_POST['idRole'];

        // Créé l'Utilisateur
        LibUser::create($username, $email, $password, $idRole);

        // Redirige l'Utilisateur vers la liste des Utilisateurs
        header('Location: /ctrl/user/list.php');
    }

    /** @Override */
    function getView()
    {
        return null;
    }
}

$ctrl = new UserCreate();
$ctrl->execute();
