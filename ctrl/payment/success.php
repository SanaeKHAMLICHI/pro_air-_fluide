<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/cart/cart.php');


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
        return 'success';
    }

    /** @Override */
    function do()
    {
        $session_id = $_SESSION['id_checkout'];

        $id_panier = $_SESSION['commande_id'];

        LibCart::updatePaymentStatus($id_panier, $session_id, 1);
    }

    /** @Override */
    function getView()
    {
        return '/view/payment/success.php';
    }
}

$ctrl = new addressDisplay();
$ctrl->execute();
