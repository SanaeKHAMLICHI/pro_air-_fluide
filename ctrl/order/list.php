<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/order/order.php');

use Monolog\Logger;

/** Liste les Utilisateurs. */
class OrdersList extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function getPageTitle()
    {
        return 'Mes commandes ';
    }

    /** @Override */
    function do()
    {
        

        // Liste les Utilisateurs, et les expose à la vue
        $listOrder = LibOrder::readAll();
        $this->addViewArg('listOrder', $listOrder);
    }

    /** @Override */
    function getView()
    {
        return '/view/order/list.php';
    }
}

$ctrl = new OrdersList();
$ctrl->execute();
