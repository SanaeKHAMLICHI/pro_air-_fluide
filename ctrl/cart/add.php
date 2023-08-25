<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/address/address.php');


use Monolog\Logger;

class addProduct extends Ctrl
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
        return false;
    }

    function do()
    {
   
    // l'ajout de la quantite de produit  dans le panier 
        if (isset($_GET['add'])) {
            $idProduct =  $this->inputs['add'];
            $product = LibProduct::get($idProduct);
    
            // Vérifie si la clé du produit existe dans le panier
            if (!isset($_SESSION['cart'][$idProduct])) {
                $_SESSION['cart'][$idProduct] = 0;
            }
    
            if ($product) {
                // Augmente la quantité du produit dans le panier
                $_SESSION['cart'][$idProduct]++;
            }
        }

    header('Location: ' . $_SERVER['HTTP_REFERER']);

    }
    
    
     function getView()
    {
        return null;
    }
}

$ctrl = new  addProduct();
$ctrl->execute();
?>
