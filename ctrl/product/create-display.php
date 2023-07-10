<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');

use Monolog\Logger;

/** Affiche le formulaire de création d'un Produit. */
class ProductCreateDisplay extends Ctrl
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
        return 'Nouveau Produit';
    }

    /** @Override */
    function do()
    {
        // Liste les Produits et les expose à la vue
        $listProduct = LibProduct::readAll();
        $this->addViewArg('listProduct', $listProduct);
    }

    /** @Override */
    function getView()
    {
        return '/view/product/create-display.php';
    }
}

$ctrl = new ProductCreateDisplay();
$ctrl->execute();
