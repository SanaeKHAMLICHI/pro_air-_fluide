<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

use Monolog\Logger;


/** Bibliothèque de fonctions dédiées aux Utilisateurs. */
class LibAddress
{
    static function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }
    static function create($fullname, $adresse, $complement, $code_postale, $ville, $pays , $telephone, $idUser)

    {
        self::log()->info(__FUNCTION__, ['fullname' => $fullname,'rue' => $adresse, 'complement' => $complement, 'code_postale' => $code_postale, 'ville' => $ville,'pays' => $pays, 'telephone' => $telephone,'idUser' => $idUser]);
       

        // Prépare la requête
        $query = 'INSERT INTO adresse (fullname, rue, complement, code_postale, ville, pays, telephone, idUser) VALUES';
        $query .= ' (:fullname, :rue, :complement, :code_postale, :ville, :pays, :telephone, :idUser)';
        
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':rue', $adresse);
        $stmt->bindParam(':complement', $complement);
        $stmt->bindParam(':code_postale', $code_postale);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':pays', $pays);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':idUser', $idUser);





        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        return $successOrFailure;
    }
    static function getListAddress($idUser)
    {
        self::log()->info(__FUNCTION__);

        // Prépare la requête
        $query = 'SELECT id, fullname ,rue, complement, code_postale,ville , pays, telephone';
        $query .= ' FROM adresse ';
        $query .= ' WHERE adresse.idUser = :idUser';

        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':idUser', $idUser);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        $listAddress = $stmt->fetchAll(PDO::FETCH_ASSOC);
        self::log()->info(__FUNCTION__, ['listAdress' => $listAddress]);

        return $listAddress;
    }
    public static function get($id)
    {
        self::log()->info(__FUNCTION__);

        // Prépare la requête
        $query = 'SELECT id, fullname, rue, complement, code_postale, ville, pays';
        $query .= ' FROM adresse ';
        $query .= ' WHERE id = :id';

        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':id', $id);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        $getAddress = $stmt->fetch(PDO::FETCH_ASSOC);
        self::log()->info(__FUNCTION__, ['getAddress' => $getAddress]);

        return $getAddress;
    }



}