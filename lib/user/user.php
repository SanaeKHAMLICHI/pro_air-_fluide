<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

use Monolog\Logger;

/** Bibliothèque de fonctions dédiées aux Utilisateurs. */
class LibUser
{
    /** Fournit une fonction de log. */
    static function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /**
     * Sélectionne tous les Utilisateurs et les ordonne par leur email, de A à Z.
     * 
     * @return array Tableau de tableaux associatifs des Utilisateurs.
     */
    static function readAll()
    {
        self::log()->info(__FUNCTION__);

        // Prépare la requête
        $query = 'SELECT U.id, email, U.password, U.idRole';
        $query .= ' FROM user AS U';
        $query .= ' ORDER BY U.email ASC';
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        self::log()->info(__FUNCTION__, ['result' => $result]);

        return $result;
    }

    /**
     * Cherche un Utilisateur d'après son email et son mot de passe.
     * NOTE Ajoute les informations du Rôle dans le résultat.
     * 
     * @param string email Adresse email.
     * @param string password Mot de passe.
     * 
     * @return mixed L'Utilisateur avec ses informations de Rôle s'il existe, ou null.
     * 
     */

    
    static function find($email, $password)
    {
        self::log()->info(__FUNCTION__, ['email' => $email, 'password' => $password]);
    
        $query = 'SELECT U.id, U.username, U.email, U.password, U.idRole, R.code AS codeRole, R.label AS codeLabel';
        $query .= ' FROM user AS U';
        $query .= ' JOIN role AS R ON U.idRole = R.id';
        $query .= ' WHERE U.email = ?';
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            if (password_verify($password, $result['password'])) {
                self::log()->info(__FUNCTION__, ['Success' => 'User found and password matches']);
                return $result; // Mot de passe correct
            }
        }
    
        self::log()->info(__FUNCTION__, ['Failure' => 'User not found or password does not match']);
        return null; // Aucun utilisateur trouvé ou mot de passe incorrect
    }


    /**
     * Obtient un Utilisateur d'après son identifiant.
     * 
     * @param int $id Identifiant de l'Utilisateur.
     * 
     * @return mixed Tableau associatif de l'Utilisateur s'il existe, ou 'null'.
     */
    static function get($id)
    {
        self::log()->info(__FUNCTION__, ['id' => $id]);

        // Prépare la requête
        $query = 'SELECT U.id, U.email, U.password, U.idRole, R.code AS codeRole, R.label AS codeLabel';
        $query .= ' FROM user AS U';
        $query .= ' JOIN role AS R ON U.idRole = R.id';
        $query .= ' WHERE U.id = :id';
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':id', $id);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        // Quand le résultat vaut 'false', retourne une valeur 'null' (ou 'absence de valeur')
        // sinon, retourne l'Utilisateur identifié.
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            return null;
        }

        self::log()->info(__FUNCTION__, ['result' => $result]);
        return $result;
    }


    /**
     * Crée un Utilisateur.
     * 
     * @param string $email Email.
     * @param string $password Mot de passe.
     * @param string $idRole Identifiant de Rôle.
     * 
     * @return bool 'true' en cas de succès.
     */
    static function create($username, $email, $password, $idRole)
    {
        self::log()->info(__FUNCTION__, ['username' => $username, 'email' => $email, 'password' => $password, 'role' => $idRole]);
        $requete = "SELECT role.id FROM role JOIN user on role.id = user.idRole WHERE role.label = 'Membre'";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hashing the password

        // Prépare la requête
        $query = 'INSERT INTO user (username ,email, password, idRole) VALUES';
        $query .= ' (:username , :email, :password, :idRole)';
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $valeur = LibDb::getPDO()->query($requete)->fetchColumn();

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':idRole',  $valeur);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        return $successOrFailure;
    }

    /**
     * Liste les Rôles ordonnées par libellés, de A à Z.
     * 
     * @return array Tableau de tableaux associatifs des Rôles.
     */
    static function listRole()
    {
        self::log()->info(__FUNCTION__);

        // Prépare la requête
        $query = 'SELECT ROL.id, ROL.code, ROL.label';
        $query .= ' FROM role ROL';
        $query .= ' ORDER BY ROL.label ASC';
        self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        self::log()->info(__FUNCTION__, ['result' => $result]);
        return $result;
    }
}
