<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/address/address.php');


use Monolog\Logger;

class deleteProduct extends Ctrl
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
    // suppression de produit  
   
    if(isset($_GET['del'])){
        $id_del = $_GET['del'] ;
        //suppression
        unset($_SESSION['cart'][$id_del]);
    }
   
    header('Location: ' . $_SERVER['HTTP_REFERER']);
   
    }
    
    
     function getView()
    {
        return null;
    }
}

$ctrl = new  deleteProduct();
$ctrl->execute();
?>
