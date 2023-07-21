<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/address/address.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/transporter/transporter.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/cart/cart.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'cart-validation.php');


use Monolog\Logger;

/** Affiche le formualire de login. */
class LoginDisplay extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function getPageTitle()
    {
        return 'Login';
    }

    /** @Override */
    function do()
    {
        // Ne fait rien...
    }

    /** @Override */
    function getView()
    {
        return '/view/auth/login-display.php';
    }
}

$ctrl = new LoginDisplay();
$ctrl->execute();
