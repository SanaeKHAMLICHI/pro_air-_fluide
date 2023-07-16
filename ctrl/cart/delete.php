<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');

use Monolog\Logger;

class DeletCart extends Ctrl
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
            if(isset($_GET['del'])){
                $id_del = $_GET['del'] ;
                //suppression
                unset($_SESSION['cart'][$id_del]);
               }
    
        }
        
        
     function getView()
    {
        return '/ctrl/cart/cart.php';
    }
}

$ctrl = new DeletCart();
$ctrl->execute();
?>
