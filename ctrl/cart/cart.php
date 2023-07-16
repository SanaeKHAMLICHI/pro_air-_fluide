<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');

use Monolog\Logger;

class AddCart extends Ctrl
{
     function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    function getPageTitle()
    {
        return null;
    }

     function isRequiredUserLogged()
    {
        return true;
    }

    function do()
    {
        $total = 0;
        $addedProducts = $_SESSION['cart'];

        if (empty($addedProducts)) {
            echo "Votre panier est vide";
        } else {
            foreach ($addedProducts as $productId => $quantity) {
                $product = LibProduct::get($productId);

                if ($product) {
                    // Calculer le total (prix unitaire * quantité) et ajouter au total général
                    $total += $product['prix'] * $quantity;
                }
            }

            echo "Le total de votre panier est : " . $total;
        }
        $this->addViewArg('total', $total);
        $this->addViewArg('addedProducts', $addedProducts);
    }

     function getView()
    {
        return '/view/cart/cart.php';
    }
}

$ctrl = new AddCart();
$ctrl->execute();
?>
