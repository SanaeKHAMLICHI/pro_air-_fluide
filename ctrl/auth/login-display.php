<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

use Monolog\Logger;

/** Affiche le formualire de login. */
class LoginDisplay extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function getPageTitle()
    {
        return 'Connexion';
    }

    /** @Override */
    function do()
    {
        // Ne fait rien...
    }

    /** @Override */
    function getView()
    {
        return '/view/auth/login-display.php';
    }
}

$ctrl = new LoginDisplay();
$ctrl->execute();
