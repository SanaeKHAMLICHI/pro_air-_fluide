<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/address/address.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/transporter/transporter.php');

use Monolog\Logger;

class GetFullCart extends Ctrl
{
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    function getPageTitle()
    {
        return "Recapitulatif de Votre Panier  ";
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
       
        $_SESSION['fullCart'] = $fullCart;
        $_SESSION['cart_total'] = $subTotal; }
        
        $this->addViewArg('fullCart', $fullCart);
        $this->addViewArg('total', $total);
        $this->addViewArg('addedProducts', $addedProducts);

        // liste des adresses du user 
        $idUser = $_SESSION['user']['id'];
        $listAddress = libAddress::getListAddress($idUser);
        $this->addViewArg('listAddress', $listAddress);

        // liste des transporteurs
        $listTransporter = LibTransporter::readAll();
        $this->addViewArg('listTransporter', $listTransporter);

        // Variable pour stocker l'état de validation du formulaire
        $isFormValid = isset($this->inputs['adresse']) && isset($this->inputs['transporter']);

        // Si le formulaire est valide, rediriger vers la page de traitement
        if ($isFormValid) {
            header("Location: /ctrl/cart/traitement.php");
            exit;
        }

        // Ajouter l'état de validation au template
        $this->addViewArg('isFormValid', $isFormValid);
    }

    function getView()
    {
        return '/view/cart/validation.php';
    }
}

$ctrl = new GetFullCart();
$ctrl->execute();
?>
