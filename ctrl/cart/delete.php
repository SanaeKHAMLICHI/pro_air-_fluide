<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');

use Monolog\Logger;

class DeleteCart extends Ctrl
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
           
            if (isset($_GET['id'])) {
                $idProduct = $_GET['id'];
                $product = LibProduct::get($idProduct);
                
                // Vérifie si la clé du produit existe dans le panier
                if (isset($_SESSION['cart'][$idProduct])) {
                    if($_SESSION['cart'][$idProduct] > 1){

                        $_SESSION['cart'][$idProduct]--;
                    }else{

                        unset( $_SESSION['cart'][$idProduct]);   
                }
        
            $listProduct = LibProduct::readAll();
            $this->addViewArg('listProduct', $listProduct);
        }}
    }  
        
     function getView()
    {
        return '/ctrl/cart/cart.php';
    }
}

$ctrl = new DeleteCart();
$ctrl->execute();
?>
