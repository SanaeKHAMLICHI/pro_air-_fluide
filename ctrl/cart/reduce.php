<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/address/address.php');


use Monolog\Logger;

class reduceProduct extends Ctrl
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
       //  Diminuer la quantite de produit dans le panier 

    if (isset($_GET['delete'])) {
        $idProduct =  $this->inputs['delete'];
        $product = LibProduct::get($idProduct);
        
        // Vérifie si la clé du produit existe dans le panier
        if (isset($_SESSION['cart'][$idProduct])) {
            if($_SESSION['cart'][$idProduct] > 1){

                $_SESSION['cart'][$idProduct]--;
            }else{

                unset( $_SESSION['cart'][$idProduct]);   
        }
        }}
   
    header('Location: ' . $_SERVER['HTTP_REFERER']);


    }
    
    
     function getView()
    {
        return null;
    }
}

$ctrl = new  reduceProduct();
$ctrl->execute();
?>
