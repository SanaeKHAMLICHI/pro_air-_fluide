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
        $email = $_SESSION['user']['email'] ;

        // Liste les Utilisateurs, et les expose à la vue
        $listOrder = LibOrder::readAll($email);
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
