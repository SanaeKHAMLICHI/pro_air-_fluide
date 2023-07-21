<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

use Monolog\Logger;


/** Bibliothèque de fonctions dédiées aux Utilisateurs. */
class LibCart
{
    static function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }
    static function save($name, $email, $transportername, $transporterprice, $adresse_livraison, $quantity, $total) {
        $query = "INSERT INTO panier (name, email, transportername, transporterprice, adresse_livraison, quantity, total) VALUES (:name, :email, :transportername, :transporterprice, :adresse_livraison, :quantity, :total)";
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':transportername', $transportername);
        $stmt->bindValue(':transporterprice', $transporterprice);
        $stmt->bindValue(':adresse_livraison', $adresse_livraison);
        $stmt->bindValue(':quantity', $quantity);
        $stmt->bindValue(':total', $total);
    
        // Exécuter la requête
        $stmt->execute();
    }
    

}