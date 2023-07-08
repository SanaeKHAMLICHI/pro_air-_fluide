<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

use Monolog\Logger;

/** Implémentation partielle d'un Controller. */
abstract class Ctrl
{
    /** Oblige chaque Controlleur à définir un logger. */
    protected abstract function log() : Logger;

    /** Informations transmises à la vue, sous forme d'un tableau associatif. */
    protected array $viewArgs = [];

    /**
     * Oblige chaque Controlleur à définir un titre de page, avec une méthode abstraite.
     * 
     * C'est une très bonne démarche de donner à chaque page un titre unique,
     * dans le cadre du référencement.
     */
    protected abstract function getPageTitle();

    /** Effectue le travail 'SPECIFIQUE' au Controlleur. */
    protected abstract function do();

    /**
     * Oblige chaque Controlleur à définir le chemin d'une 'view', même s'il peut être null.
     * 
     * @return mixed Chemin absolu du fichier de vue, ou null par défaut.
     */
    protected abstract function getView();

    /**
     * Propose à chaque Controlleur de définir si l'accès demande à l'Utilisateur d'être loggé.
     * 
     * @return boolean Par défaut, vaut false.
     */
    protected function isRequiredUserLogged()
    {
        return false;
    }

    /**
     * Propose à chaque Controlleur de définir s'il exige un Rôle de l'éventuel Utilisateur loggé.
     * 
     * @return mixed Code du Rôle exigé. Par défaut, null.
     */
    protected function requireRole()
    {
        return null;
    }

    /** Effectue le travail 'GENERIQUE' du Controlleur. */
    public function execute()
    {
        $this->log()->info(__FUNCTION__);

        // Chronomètre : start
        $start = microtime(true);

        // Active par défaut le support des sessions
        session_start();

        // Vérifie si l'Utilisateur doit être loggé
        $this->guardIsUSerLogged();

        // Vérifie si l'Utilisateur doit avoir un Rôle particulier
        $codeRole = $this->requireRole();
        $this->guardHasUserRole($codeRole);

        // Réalise le traitement effectué par le Controlleur
        $this->do();

        // Met à disposition de la 'vue' le contenu de la session utilisateur
        $this->addViewArg('session', $_SESSION);

        // Fournit à la vue l'information de titre de page
        $this->addViewArg('pageTitle', $this->getPageTitle());

        // Chronomètre : stop
        $end = microtime(true);

        // Calcule le temps passé dans le Controlleur et fournit l'information à la vue
        $elapsedtime = $end - $start;
        $displayedElapsedtime = round($elapsedtime, 4);
        $this->log()->info(__FUNCTION__, ['displayedElapsedtime' => $displayedElapsedtime]);
        $this->addViewArg('elapsedTime', "Elapsed time for the request : $displayedElapsedtime seconds");

        // Rend la vue
        $this->renderView();
    }

    /** Rends éventuellement la vue. */
    private function renderView()
    {
        $viewFilepath = $this->getView();
        if ($viewFilepath != null) {

            // Expose à la vue toutes les variables disponibles,
            // sous forme d'un tableau associatif nommé 'args'
            $args = $this->viewArgs;

            include($_SERVER['DOCUMENT_ROOT'] . '/view/partial/test-header.php');
            include($_SERVER['DOCUMENT_ROOT'] . $viewFilepath);
            // include($_SERVER['DOCUMENT_ROOT'] . '/view/_partial/footer.php');
        }
    }

    /** Expose un argument à la 'vue', sous forme de clé/valeur. */
    protected function addViewArg($key, $value)
    {
        $this->viewArgs["$key"] = $value;
    }

    /** Indique si l'utilisateur est loggué. */
    protected function isUserLogged()
    {
        return isset($_SESSION['user']);
    }

    /**
     * Quand l'Utilisateur doit être loggé et qu'il ne l'est pas,
     * le redirige vers la page de login.
     */
    private function guardIsUSerLogged()
    {
        if ($this->isRequiredUserLogged() && !$this->isUserLogged()) {

            header('Location: /ctrl/auth/login-display.php');
        }
    }
    /**
     * Quand l'Utilisateur loggé doit posséder un Rôle particulier,
     * le redirige vers la page de login.
     */
    private function guardHasUserRole($codeRole)
    {
        if ($codeRole != null && $_SESSION['user']['codeRole'] !== $codeRole) {

            header('Location: /ctrl/auth/login-display.php');
        }
    }
}
