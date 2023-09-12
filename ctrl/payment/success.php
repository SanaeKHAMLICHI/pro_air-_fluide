<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/cart/cart.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/order/order.php');



use Monolog\Logger;

/** Affiche le formualire de login. */
class success_paiment extends Ctrl
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
        $addedProducts =  $_SESSION['fullCart']['product'];

        $stripe_id = $_SESSION['id_checkout'];
        $id_panier = $_SESSION['commande_id'];
        $total =  $_SESSION['TOTAL'];
        $idUser = $_SESSION['user']['id'];
        $name = $_SESSION['user']['username'];
        $email = $_SESSION['user']['email'];
        $idTransporter =  $_SESSION['idTransporter'];
        $idAdresse =  $_SESSION['idAddress'];
        // $quantity = array_sum($_SESSION['cart']);

        LibCart::updatePaymentStatus($id_panier, $stripe_id, 1);
        $quantityTotal = 0;

        // Calculer la quantité totale à partir du tableau $addedProducts
        foreach ($addedProducts as $item) {
            $quantityTotal += $item['quantity'];
        }
        
        // Enregistrer la commande dans la base de données
        $lastInsertedId = LibOrder::save($name, $email, $idTransporter, $idAdresse, $quantityTotal, $stripe_id, $total);
        
        // Enregistrer les détails de chaque produit dans la commande
        foreach ($addedProducts as $item) {
            $product_name = $item['product']['label'];
            $product_price = $item['product']['prix'];
            $product_quantity = $item['quantity'];
        
            // Utiliser l'ID de la commande pour enregistrer les détails du produit dans la table "orderdetails"
            LibOrder::savedetails($product_name, $product_price, $product_quantity, $lastInsertedId, $idUser);
        }
        $reference = LibOrder::get($lastInsertedId);
        $this->addViewArg('reference', $reference);


    }

    /** @Override */
    function getView()
    {
        return '/view/payment/success.php';
    }
}

$ctrl = new success_paiment();
$ctrl->execute();
