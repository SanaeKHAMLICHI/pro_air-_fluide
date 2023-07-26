<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/order/order.php');

use Monolog\Logger;

/** Détail d'un produit. */
class Order extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function getPageTitle()
    {
        return 'Commande : ' . $this->viewArgs['order']['reference'];
    }

    /** @Override */
    function do()
    {
        // Obtient le détail d'un produit et l'expose à la vue
        $idOrder = $_GET['id'];
        $order = LibOrder::get($idOrder);
        $orderDetails = LibOrder::getOrderdetails($idOrder);
        $this->addViewArg('order', $order);

        $this->addViewArg('orderDetails', $orderDetails);
    }

    /** @Override */
    function getView()
    {
        return '/view/order/order.php';
    }
}

$ctrl = new Order();
$ctrl->execute();
?>