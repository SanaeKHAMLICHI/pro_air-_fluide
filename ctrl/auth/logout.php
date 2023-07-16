<?php



require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

use Monolog\Logger;

/** Traite le formulaire de Logout. */
class Logout extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function getPageTitle()
    {
        return null;
    }

    /** @Override */
    function do()
    {
        // Vide la session de l'Utilisateur
        $_SESSION = [];
        $_SESSION['cart'] = [];

        // et le redirige vers la page d'accueil
        header('Location: ../../view/accueil2.php');
    }

    /** @Override */
    function getView()
    {
        return null;
    }
}

$ctrl = new Logout();
$ctrl->execute();
