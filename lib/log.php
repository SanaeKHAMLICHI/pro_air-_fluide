<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/** Bibliothèque de fonctions de log. */
class Log
{
    /** Fournit un accès au fichier de log. */
    public static function getLog($name) : Logger {

        $log = new Logger($name);
        $log->pushHandler(new StreamHandler($_SERVER['DOCUMENT_ROOT'].'/log/app.log', Logger::DEBUG));

        return $log;
    }

    /** Fait un simple 'echo' d'un message passé en paramètre. */
    static function msg($msg)
    {
        echo $msg . PHP_EOL;
    }
}
