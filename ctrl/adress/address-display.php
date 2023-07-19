<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

use Monolog\Logger;

/** Affiche le formualire de login. */
class addressDisplay extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function getPageTitle()
    {
        return 'Nouvelle address';
    }

    /** @Override */
    function do()
    {
        // Ne fait rien...
    }

    /** @Override */
    function getView()
    {
        return '/view/address/address-display.php';
    }
}

$ctrl = new addressDisplay();
$ctrl->execute();
