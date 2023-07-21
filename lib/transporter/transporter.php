<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

use Monolog\Logger;


/** Bibliothèque de fonctions dédiées aux Utilisateurs. */
class LibTransporter
{
    static function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }
    static function readAll()
    {
        self::log()->info(__FUNCTION__);

        // Prépare la requête
        $query = 'SELECT T.id, T.name , T.description , T.prix';
        $query .= ' FROM transporteur AS T';
        $query .= ' ORDER BY T.name ASC';
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        self::log()->info(__FUNCTION__, ['result' => $result]);

        return $result;
    }
    static function create($name , $description, $prix)
    {
        self::log()->info(__FUNCTION__, ['name' => $name,'description' => $description, 'prix' => $prix]);
       

        // Prépare la requête
        $query = 'INSERT INTO produit (name ,description, prix) VALUES';
        $query .= ' (:name , :description, :prix)';
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':prix', $prix);
       


        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        return $successOrFailure;
    }
    
    static function delete($id)
    {
        self::log()->info(__FUNCTION__);
        $query = 'DELETE FROM transporteur WHERE id = :id';
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':id', $id);
        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0)' => $successOrFailure]);
    
        return $successOrFailure;
    }
    static function update($id, $newname, $newdescription, $newprix)
    {
        // Prépare la requête
        $query = 'UPDATE produit SET name = :name, description = :description, prix = :prix WHERE id = :id';
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);   
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $newname);
        $stmt->bindParam(':description', $newdescription);
        $stmt->bindParam(':prix', $newprix);
       
        
        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);
    
        return $successOrFailure;
    }
}