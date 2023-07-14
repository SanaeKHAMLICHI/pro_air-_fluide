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
        // Vérifie si une session existe
        if (!isset($_SESSION)) {
            // Si non, démarre la session
            session_start();
        }

        // Crée la session panier s'il n'existe pas
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_GET['id'])) {
            $idProduct = $_GET['id'];
            $product = LibProduct::get($idProduct);

            if (isset($_SESSION['cart'][$idProduct])) {
                // Si le produit est déjà dans le panier, augmenter la quantité
                $_SESSION['cart'][$idProduct]++;
            } else {
                // Sinon, ajouter le produit au panier
                $_SESSION['cart'][$idProduct] = 1;
                echo 'Le produit a bien été ajouté au panier.';
                
            }var_dump($_SESSION['cart']);
        }
    }

     function getView()
    {
        return null;
    }
}

$ctrl = new AddCart();
$ctrl->execute();
?>
