<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

use Monolog\Logger;


/** Bibliothèque de fonctions dédiées aux Utilisateurs. */
class LibProduct
{
    static function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }
    static function readAll()
    {
        self::log()->info(__FUNCTION__);

        // Prépare la requête
        $query = 'SELECT P.id, P.label , P.description , P.prix, P.ref , P.picture';
        $query .= ' FROM produit AS P';
        $query .= ' ORDER BY P.ref ASC';
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        self::log()->info(__FUNCTION__, ['result' => $result]);

        return $result;
    }
    static function create($label , $description, $prix, $ref, $picture)
    {
        self::log()->info(__FUNCTION__, ['label' => $label,'description' => $description, 'prix' => $prix, 'ref' => $ref, 'picture' => $picture]);
       

        // Prépare la requête
        $query = 'INSERT INTO produit (label ,description, prix, ref,picture) VALUES';
        $query .= ' (:label , :description, :prix, :ref, :picture)';
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':label', $label);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':ref', $ref);
        $stmt->bindParam(':picture', $picture);


        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        return $successOrFailure;
    }
    static function get($id)
    {
        self::log()->info(__FUNCTION__, ['id' => $id]);

        // Prépare la requête
        $query = 'SELECT P.id, P.label,P.ref, P.description,  P.prix, P.picture';
        $query .= ' FROM produit AS  P';
        $query .= ' WHERE P.id = :id';
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':id', $id);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        self::log()->info(__FUNCTION__, ['result' => $result]);

        return $result;
    }
    static function delete($id)
    {
        self::log()->info(__FUNCTION__);
        $query =   'DELETE procuit';
        $query .='FROM produit';
        $query .= ' WHERE produit.id =:id';
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':id', $id);
         // Exécute la requête
         $successOrFailure = $stmt->execute();
         self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);
 
         return $successOrFailure;

    }

}