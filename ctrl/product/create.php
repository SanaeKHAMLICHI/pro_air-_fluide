<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');

use Monolog\Logger;

/** Traite le formulaire de création d'un Utilisateur. */
class ProductCreate extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function isRequiredUserLogged()
    {
        return true;
    }

    /** @Override */
    function getPageTitle()
    {
        return null;
    }

    /** @Override */
    function do()
    {
        // lit les données saisies dans le formulire
        $label = $this->inputs['label'];
        $description = $this->inputs['description'];
        $prix = $this->inputs['prix']; 
        $ref = $this->inputs['ref'];
        $picture = $this->inputs['picture'];
        $idUser = $this->inputs['idUser'];



        // Créé l'Utilisateur
        LibProduct::create($label, $description, $prix, $ref, $picture, $idUser);

        // Redirige l'Utilisateur vers la liste des Utilisateurs
        header('Location: /product/list');
    }

    /** @Override */
    function getView()
    {
        return null;
    }
}

$ctrl = new ProductCreate();
$ctrl->execute();
