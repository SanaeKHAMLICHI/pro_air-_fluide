<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');

use Monolog\Logger;

/** Liste les Utilisateurs. */
class ProductList extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function getPageTitle()
    {
        return 'Products';
    }

    /** @Override */
    function do()
    {
        // Liste les Utilisateurs, et les expose à la vue
        $listProduct = LibProduct::readAll();
        $this->addViewArg('listProduct', $listProduct);
    }

    /** @Override */
    function getView()
    {
        return '/view/product/list.php';
    }
}

$ctrl = new ProductList();
$ctrl->execute();
