<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

use Monolog\Logger;

class LibDb
{
    /** Fournit une fonction de log. */
    static function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /**
     * Ouvre une connexion à la Base de données,
     * et configure la connexion pour afficher toutes les erreurs (s'il s'en produit).
     */
    static function getPDO()
    {
        self::log()->info(__FUNCTION__);

        $host = Config::db['host'];
        $port = Config::db['port'];
        $dbname = Config::db['dbname'];
        $user = Config::db['user'];
        $password = Config::db['password'];
        $dataSourceName = "mysql:host=$host;port=$port;dbname=$dbname";
        $pdo = new PDO($dataSourceName, $user, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}
