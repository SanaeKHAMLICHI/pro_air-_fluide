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
        $query = "INSERT INTO panier (name,email, transportername, transporterprice, adresse_livraison, quantity, total) VALUES (:name, :email, :transportername, :transporterprice, :adresse_livraison, :quantity, :total)";
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
    // affecter une valeur null a la variable $lastInsertedId
        $lastInsertedId = null;
    // faire une requette le dernier id sur la table panier pour que je pusie l'utiliser sur la table panierdetails 
        $result = LibDb::getPDO()->query("SELECT MAX(id) as last_id FROM panier");
        if ($result) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $lastInsertedId = $row['last_id'];
        }
// recupere la valeur apres l'execution de la requette 
       return $lastInsertedId;
    }
    
    static function savedetails($product_name, $product_price, $product_quantity, $idPanier, $idUser) {
        $query = "INSERT INTO panierdetails (product_name, product_price, product_quantity, idPanier , idUser) VALUES (:product_name, :product_price, :product_quantity, :idPanier, :idUser)";
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindValue(':product_name', $product_name);
        $stmt->bindValue(':product_price', $product_price);
        $stmt->bindValue(':product_quantity', $product_quantity);
        $stmt->bindValue(':idPanier', $idPanier);
        $stmt->bindValue(':idUser', $idUser);

    
        // Exécuter la requête
        $stmt->execute();
    }
    static function updatePaymentStatus($commande_id, $stripe_id, $is_payed) {
        $query = "UPDATE panier SET stripe_id = :stripe_id, is_payed = :is_payed WHERE id = :commande_id";
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindValue(':stripe_id', $stripe_id);
        $stmt->bindValue(':is_payed', $is_payed, PDO::PARAM_INT);
        $stmt->bindValue(':commande_id', $commande_id, PDO::PARAM_INT);
    
        // Exécuter la mise à jour
        $stmt->execute();
    }
    
    

}