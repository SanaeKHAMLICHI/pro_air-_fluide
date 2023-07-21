<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/address/address.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/transporter/transporter.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/cart/cart.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/cart/cart-validation.php');



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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['validate_order'])) {
            $AddressId = $_POST['adresse'];
            $TransporterId = $_POST['transporter'];
            // Vous pouvez faire ce que vous souhaitez avec les ID d'adresse et de transporteur sélectionnés ici
            // Par exemple, enregistrer ces choix dans une session ou une variable pour une utilisation ultérieure

            // Récupérer les autres informations nécessaires de la session ou des données postées
            $idUser = $_SESSION['user']['id'];
            $name = $_SESSION['user']['username'];
            $email = $_SESSION['user']['email'];
            $addedProducts =array_sum($_SESSION['cart']);
            $total = $_SESSION['cart_total'];
            // Récupérer la valeur de $total à partir des arguments de la vue
            //    livraison 
            $selectedAddress = libAddress::get($AddressId);
            $adresse_livraison = $selectedAddress['adresse'] . ', ' . $selectedAddress['code_postale'] . ', ' . $selectedAddress['ville'] . ', ' . $selectedAddress['pays'];
            
        // transporter 
            $selectedTransporter = LibTransporter::get($TransporterId);
            $transportername = $selectedTransporter ['name'];
            $transporterprice = $selectedTransporter ['prix'];

          


            // Enregistrer la commande dans la table "panier" de la base de données
            LibCart::save($name, $email,$transportername , $transporterprice ,$adresse_livraison,$addedProducts, $total, $idUser);

            // Vider le panier après la validation de la commande
            $_SESSION['cart'] = [];

            // Rediriger vers une autre page après la validation du formulaire
           
            exit();
        }
    }

    function getView()
    {
        return '/ctrl/cart/cart-validation.php';
    }
}

$ctrl = new CommandeValidation();
$ctrl->execute();
?>
