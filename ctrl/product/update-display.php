<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');

use Monolog\Logger;

/** Affiche le formualire de login. */
class updateDisplay extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function getPageTitle()
    {
        return 'Modifiez le Produit';
    }

    /** @Override */
    function do()
    {
        $idProduct = $_GET['id'];
        $product = LibProduct::get($idProduct);
        $this->addViewArg('product', $product);    }

    /** @Override */
    function getView()
    {
        return '/view/product/update-display.php';
    }
}

$ctrl = new updateDisplay();
$ctrl->execute();
