<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/address/address.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/transporter/transporter.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/cart/cart.php');

use Monolog\Logger;

class CommandeValidation extends Ctrl
{
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    function getPageTitle()
    {
        return 'Validation de commande';
    }

    function isRequiredUserLogged()
    {
        return true;
    }

    function do()
    {
        // Vérifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($this->inputs['validate_order'])) {
            // Récupérer les valeurs des ID 
            $AddressId = $this->inputs['adresse'];
            $_SESSION['idAddress'] = $AddressId;

            $TransporterId =$this->inputs['transporter'];
            $_SESSION['idTransporter'] = $TransporterId;


            // Récupérer les autres informations nécessaires de la session ou des données postées
            $idUser = $_SESSION['user']['id'];
            $name = $_SESSION['user']['username'];
            $email = $_SESSION['user']['email'];
            $quantity = array_sum($_SESSION['cart']);

            $addedProducts =  $_SESSION['fullCart']['product'];
            $fullCart = $_SESSION['fullCart'];

            // Récupérer la valeur de $total à partir des arguments de la vue
            $total = $_SESSION['cart_total'];

            // Info d'adresse de livraison
            $selectedAddress = LibAddress::get($AddressId);
            $adresse_livraison = $selectedAddress['rue'] . ', ' . $selectedAddress['code_postale'] . ', ' . $selectedAddress['ville'] . ', ' . $selectedAddress['pays'];
            $_SESSION['address'] = $adresse_livraison;

            // Info transporter 
            $selectedTransporter = LibTransporter::get($TransporterId);
            $_SESSION['transporter']=  $selectedTransporter;
            $transportername = $selectedTransporter['name'];
            $transporterprice = $selectedTransporter['prix'];
            $_SESSION['transporter_prix'] =  $selectedTransporter['prix'];
            $this->log()->info(__FUNCTION__, ['transporterprice' => $transporterprice ]);
            $this->log()->info(__FUNCTION__, ['$_SESSION TOTAl ttc' => $_SESSION['fullCart']['data']['TotalTTC'] ]);

            $_SESSION['TOTAL'] = $transporterprice +  $_SESSION['fullCart']['data']['TotalTTC'];
            

            // Enregistrer la commande dans la table "panier" de la base de données
            // Partie 1 : Insérer la commande dans la table "panier" et récupérer l'ID du panier inséré
            $lastInsertedId = LibCart::save($name, $email,  $TransporterId, $AddressId, $quantity, $total);

            // Partie 2 : Insérer les détails de chaque produit dans la table "panierdetails"
            // Enregistrer les détails de chaque produit dans la table "panierdetails"
            foreach ($addedProducts as $item) {
                $product_name = $item['product']['label'];
                $product_price = $item['product']['prix'];
                $product_quantity = $item['quantity'];

                // Utiliser l'ID du panier pour enregistrer les détails du produit dans la table "panierdetails"
                LibCart::savedetails($product_name, $product_price, $product_quantity,  $lastInsertedId, $idUser);
            }

            // Vider le panier après la validation de la commande
            $_SESSION['cart'] = [];

            // Ajouter les arguments de vue avant de rediriger vers la page de confirmation
            $this->addViewArg('fullcart', $fullCart);
            $this->addViewArg('selectedAddress', $selectedAddress);
            $this->addViewArg('selectedTransporter', $selectedTransporter);
            $_SESSION['commande_id'] = $lastInsertedId;
        }
    }

    function getView()
    {
        return '/view/cart/confirmation-commande.php';
    }
}

$ctrl = new CommandeValidation();
$ctrl->execute();
