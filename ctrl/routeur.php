<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

use Monolog\Logger;

/** Routeur. */
class Routeur
{

    /** Oéfinit un logger. */
    private function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    public function do()
    {
         // Lit le chemin de l'URL demandée
         $url = parse_url($_SERVER['REQUEST_URI'])['path'];

         // Référence toutes les routes de l'application
         $routes = [];
           // - page d'accueil
        $routes['/'] = '/ctrl/product/list.php';
        
       
      

        $routes['/auth/login-display'] = '/ctrl/auth/login-display.php';
        $routes['/auth/login'] = '/ctrl/auth/login.php'; 
        $routes['/auth/logout'] = '/ctrl/auth/logout.php';
        
        $routes['/user/create-display'] = '/ctrl/user/create-display.php';
        $routes['/user/create'] = '/ctrl/user/create.php';


        $routes['/cart/clear'] = '/ctrl/cart/clear.php';           
        $routes['/cart/validation'] = '/ctrl/cart/validation.php'; ;
        $routes['/cart/reduce'] = '/ctrl/cart/reduce.php';
        $routes['/cart/add'] = '/ctrl/cart/add.php';
        $routes['/cart/delete'] = '/ctrl/cart/delete.php';

        $routes['/cart/traitement'] = '/ctrl/cart/traitement.php';
        $routes['/cart/validation'] = '/ctrl/cart/validation.php';
        $routes['/cart/cart'] = '/ctrl/cart/cart.php';

        $routes['/payment/payment'] = '/ctrl/payment/payment.php';

        $routes['/address/address'] = '/ctrl/address/address.php';
        $routes['/address/address-display'] = '/ctrl/address/address-display.php';
       
        $routes['/order/get'] = '/ctrl/order/get.php';
        $routes['/order/list'] = '/ctrl/order/list.php';


        $routes['/product/list'] = '/ctrl/product/list.php';
        $routes['/product/create'] = '/ctrl/product/create.php';
        $routes['/product/create-display'] = '/ctrl/product/create-display.php';
        $routes['/product/get'] = '/ctrl/product/get.php';
        $routes['/product/delete'] = '/ctrl/product/delete.php';
        $routes['/product/update-display'] = '/ctrl/product/update-display.php.php';
        $routes['/product/quantity'] = '/ctrl/product/quantity.php';
        $routes['/product/update'] = '/ctrl/product/update.php';

        $routes['/transporter/list'] = '/ctrl/transporter/list.php';
        $routes['/transporter/create'] = '/ctrl/transporter/create.php';
        $routes['/transporter/create-display'] = '/ctrl/transporter/create-display.php';
        
        

        $route = $routes[$url];

        if (!isset($route)) {

            $this->log()->error('__FUNCTION__', ['404' => $route]);
            $target = $_SERVER['DOCUMENT_ROOT'] . '/view/_error/404.php';
            include($target);
            exit();
        }

        // Interprête/exécute le code du controller ciblé
        $target = $_SERVER['DOCUMENT_ROOT'] . $route;
        include($target);
    }
}

$routeur = new Routeur();
$routeur->do();