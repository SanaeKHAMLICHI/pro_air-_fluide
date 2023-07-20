<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');

use Monolog\Logger;

class ClearCart extends Ctrl
{
     function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

     function getPageTitle()
    {
        return null;
    }

  

   
        // Vérifie si une session existe


        // Crée la session panier s'il n'existe pas
       
        
        function do()
        {
           
            

                        $_SESSION['cart']=[];
                 
    }  
        
     function getView()
    {
        return '/view/cart/cart.php';
    }
}

$ctrl = new ClearCart();
$ctrl->execute();
