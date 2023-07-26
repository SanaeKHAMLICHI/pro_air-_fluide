<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

use Monolog\Logger;


/** Bibliothèque de fonctions dédiées aux Utilisateurs. */
class LibOrder
{
    static function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }
    static function getReference() {
        // Générer un numéro de référence unique basé sur l'horodatage actuel
        $min = 1000000; // 7 chiffres (10^6)
        $max = 9999999; // 7 chiffres (10^7 - 1)
    
        $uniqueNumber = random_int($min, $max);
    
        return (string)$uniqueNumber; // Convertir en chaîne de caractères (si nécessaire)
    }

    static function save($name, $email, $transportername, $transporterprice, $adresse_livraison, $quantity, $stripe_id, $total) {
        // Générer une référence aléatoire en utilisant MD5 de l'heure courante et l'adresse e-mail
        $reference = self::getReference(6);
    
        $query = "INSERT INTO orders (name, reference, email, transportername, transporterprice, adresse_livraison, quantity,stripe_id, total) 
                  VALUES (:name, :reference, :email, :transportername, :transporterprice, :adresse_livraison, :quantity, :stripe_id, :total)";
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
    
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':reference', $reference);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':transportername', $transportername);
        $stmt->bindValue(':transporterprice', $transporterprice);
        $stmt->bindValue(':adresse_livraison', $adresse_livraison);
        $stmt->bindValue(':quantity', $quantity);
        $stmt->bindValue(':stripe_id', $stripe_id);

        $stmt->bindValue(':total', $total);
    
        // Exécuter la requête
        $stmt->execute();
    
        // Récupérer l'ID de la dernière commande insérée
        $lastInsertedId = null;
        // faire une requette le dernier id sur la table panier pour que je pusie l'utiliser sur la table panierdetails 
            $result = LibDb::getPDO()->query("SELECT MAX(id) as last_id FROM orders");
            if ($result) {
                $row = $result->fetch(PDO::FETCH_ASSOC);
                $lastInsertedId = $row['last_id'];
            }
    // recupere la valeur apres l'execution de la requette 
           return $lastInsertedId;
    }
    
    
    static function savedetails($product_name, $product_price, $product_quantity, $idOrder, $idUser) {
        $query = "INSERT INTO orderdetails (product_name, product_price, product_quantity, idOrder , idUser) VALUES (:product_name, :product_price, :product_quantity, :idOrder, :idUser)";
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindValue(':product_name', $product_name);
        $stmt->bindValue(':product_price', $product_price);
        $stmt->bindValue(':product_quantity', $product_quantity);
        $stmt->bindValue(':idOrder', $idOrder);
        $stmt->bindValue(':idUser', $idUser);

    
        // Exécuter la requête
        $stmt->execute();
    }
    static function readAll()
{
    self::log()->info(__FUNCTION__);

    // Prépare la requête
    $query = 'SELECT O.id, O.reference, DATE_FORMAT(O.created_at, "%Y-%m-%d") as created_at, O.quantity, O.total';
    $query .= ' FROM orders AS O';
    $query .= ' ORDER BY O.reference ASC';
    self::log()->info(__FUNCTION__, ['query' => $query]);
    $stmt = LibDb::getPDO()->prepare($query);

    // Exécute la requête
    $successOrFailure = $stmt->execute();
    self::log()->info(__FUNCTION__, ['Success (1) or Failure (0)?' => $successOrFailure]);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    self::log()->info(__FUNCTION__, ['result' => $result]);

    return $result;
}

    static function get($id)
    {
        self::log()->info(__FUNCTION__, ['id' => $id]);
    
        // Prépare la requête avec la fonction DATE_FORMAT() pour formater la date
        $query = 'SELECT OS.id, OS.reference, OS.email, OS.transportername, OS.adresse_livraison, DATE_FORMAT(OS.created_at, "%Y-%m-%d ") as created_at, OS.total, O.product_name, O.product_price, O.product_quantity ';
        $query .= ' FROM orders AS OS';
        $query .= ' JOIN orderdetails AS O ON OS.id = O.idOrder';
        $query .= ' WHERE OS.id = :id';
    
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':id', $id);
    
        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0)?' => $successOrFailure]);
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        self::log()->info(__FUNCTION__, ['result' => $result]);
    
        return $result;
    }
    
    
    

}