<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');
use Monolog\Logger;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action === 'addproduct') {
        addproduct();
    }
}

function addproduct()
{
    // Vérifie si une session existe
    // Crée la session panier s'il n'existe pas
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_GET['id'])) {
        $idProduct = $_GET['id'];
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
}


require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/cart/cart.php');
