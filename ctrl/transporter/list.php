<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/transporter/transporter.php');

use Monolog\Logger;

/** Liste les Utilisateurs. */
class TransporterList extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function getPageTitle()
    {
        return 'Transporters';
    }

    /** @Override */
    function do()
    {
        // if (empty($_SESSION['cart'])) {
        //     $_SESSION['cart'] = [];}

        // Liste les Utilisateurs, et les expose à la vue
        $listTransporter = LibTransporter::readAll();
        $this->addViewArg('listTransporter', $listTransporter);
    }

    /** @Override */
    function getView()
    {
        return '/view/transporter/list.php';
    }
}

$ctrl = new TransporterList();
$ctrl->execute();
