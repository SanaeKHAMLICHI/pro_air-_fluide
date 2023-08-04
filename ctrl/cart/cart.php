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
        return 'Votre Panier';
    }

     function isRequiredUserLogged()
    {
        return false;
    }

    function do()
    {
  
    


$tva = 0.2;
        $total = 0;
        $fullCart = [];
        $quantityCart = 0; 
        $addedProducts = $_SESSION['cart'];

        if (empty($addedProducts)) {
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
                $fullCart['data'] = [
                    "quantityCart" => $quantityCart,
                    "total" => $total,
                    "taxe" => round($total * $tva, 2),
                    "TotalTTC" => round($total + ($total * $tva), 2)
                ];
            }

        }
        $this->addViewArg('fullCart', $fullCart);

        $this->addViewArg('total', $total);
        $this->addViewArg('addedProducts', $addedProducts);
        $listProduct = LibProduct::readAll();
        $this->addViewArg('listProduct', $listProduct);

      
    }
    
    
     function getView()
    {
        return '/view/cart/cart.php';
    }
}

$ctrl = new  getfullCart();
$ctrl->execute();
?>
