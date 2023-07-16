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

   
        // Vérifie si une session existe


        // Crée la session panier s'il n'existe pas
         function do()
        {
            $cartTotal = 0 ;
            // Vérifie si une session existe
         
            // Crée la session panier s'il n'existe pas
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
        
            if (isset($_GET['id'])) {
                $idProduct = $_GET['id'];
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
        
            // Calcul la somme totale des produits dans le panier
    
    
    
        }
        
        
     function getView()
    {
        return '/ctrl/product/list.php';
    }
}

$ctrl = new AddCart();
$ctrl->execute();
?>
