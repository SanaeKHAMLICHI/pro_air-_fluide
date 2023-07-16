<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');

use Monolog\Logger;

/** Détail d'un produit. */
class Product extends Ctrl
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
        // Obtient le détail d'un produit et l'expose à la vue
        $idProduct = $_GET['id'];
        $deleteproduct = LibProduct::delete($idProduct); 
        $listProduct = LibProduct::readAll();

        $this->addViewArg('product', $deleteproduct);
       
        $this->addViewArg('listProduct', $listProduct);
    }

    /** @Override */
    function getView()
    {
        return '/view/product/list.php';
    }
}

$ctrl = new Product();
$ctrl->execute();
?>