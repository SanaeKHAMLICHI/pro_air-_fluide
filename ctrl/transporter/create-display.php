<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/transporter/transporter.php');

use Monolog\Logger;

/** Affiche le formulaire de création d'un Produit. */
class TransporterCreateDisplay extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function isRequiredUserLogged()
    {
        return true; // Mettez la valeur appropriée selon votre logique
    }

    /** @Override */
    function getPageTitle()
    {
        return 'Nouveau Transporter';
    }

    /** @Override */
    function do()
    {
        // Liste les Produits et les expose à la vue
        $listTransporter = LibTransporter::readAll();
        $this->addViewArg('listTransporter', $listTransporter);
    }

    /** @Override */
    function getView()
    {
        return '/view/transporter/create-display.php';
    }
}

$ctrl = new TransporterCreateDisplay();
$ctrl->execute();
