<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/address/address.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/transporter/transporter.php');


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
        $total = 0;
        $fullCart = [];
        $tva = 0.2; // TVA à 20% (vous pouvez ajuster cette valeur si nécessaire)
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
                    $subTotal = round($total + ($total * $tva), 2);

                }
                $fullCart['data'] = [
            "quantityCart" => $quantityCart,
            "total" => $total,
            "taxe" => round($total * $tva, 2),
            "TotalTTC" => round($total + ($total * $tva), 2)
        ];
            }
        }

    $_SESSION['cart_total'] = $subTotal;

        
        $this->addViewArg('fullCart', $fullCart);

        $this->addViewArg('total', $total);
        $this->addViewArg('addedProducts', $addedProducts);

        // liste des adresses du user 
        $idUser = $_SESSION['user']['id'];
        $listAddress = libAddress::getListAddress($idUser);
        $this->addViewArg('listAddress', $listAddress);
        // liste des adresses du transporteur

        $listTransporter = LibTransporter::readAll();
        $this->addViewArg('listTransporter', $listTransporter);
    }

    function getView()
    {
        return '/view/cart/cart-validation.php';
    }
}

$ctrl = new getfullCart();
$ctrl->execute();
?>
