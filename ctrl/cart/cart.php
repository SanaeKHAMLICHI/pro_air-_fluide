<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/address/address.php');


use Monolog\Logger;

class getfullCart extends Ctrl
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
    // suppression de produit  
        if(isset($_GET['del'])){
            $id_del = $_GET['del'] ;
            //suppression
            unset($_SESSION['cart'][$id_del]);
        }
    // l'ajout de la quantite de produit  dans le panier 
        if (isset($_GET['add'])) {
            $idProduct = $_GET['add'];
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
    //  Diminuer la quantite de produit dans le panier 
    if (isset($_GET['delete'])) {
        $idProduct = $_GET['delete'];
        $product = LibProduct::get($idProduct);
        
        // Vérifie si la clé du produit existe dans le panier
        if (isset($_SESSION['cart'][$idProduct])) {
            if($_SESSION['cart'][$idProduct] > 1){

                $_SESSION['cart'][$idProduct]--;
            }else{

                unset( $_SESSION['cart'][$idProduct]);   
        }
        }}



        $total = 0;
        $fullCart = [];
        $quantityCart = 0; 
        $addedProducts = $_SESSION['cart'];

        if (empty($addedProducts)) {
            echo "Votre panier est vide";
        } else {
            foreach ($addedProducts as $productId => $quantity) {
                $product = LibProduct::get($productId);

                if ($product) {
                    $fullCart['product'][] = [
                        "quantity" => $quantity,
                        "product" => $product
                    ];

                    // Calculer le total (prix unitaire * quantité) et ajouter au total général
                   $quantityCart += $quantity;
                   $total += $product['prix'] * $quantity;
                }
            }

        }
      
        $this->addViewArg('total', $total);
        $this->addViewArg('addedProducts', $addedProducts);

        // liste des adresses du user 
        $idUser = $_SESSION['user']['id'];
        $listAddress =  libAddress::getListAddress($idUser);
        $this->addViewArg('listAddress', $listAddress);
    }
    
    
     function getView()
    {
        return '/view/cart/cart.php';
    }
}

$ctrl = new  getfullCart();
$ctrl->execute();
?>
