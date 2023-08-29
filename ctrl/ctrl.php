<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

use Monolog\Logger;

/** Implémentation partielle d'un Controller. */
abstract class Ctrl
{
    /** Oblige chaque Controlleur à définir un logger. */
    protected abstract function log(): Logger;

    /** Informations transmises à la vue, sous forme d'un tableau associatif. */
    protected array $viewArgs = [];

    /** Entrées de l'Utilisateur nettoyées, sous forme d'un tableau associatif. */
    protected array $inputs = [];

    /**
     * Oblige chaque Controlleur à définir un titre de page, avec une méthode abstraite.
     * 
     * C'est une très bonne démarche de donner à chaque page un titre unique,
     * dans le cadre du référencement.
     */
    protected abstract function getPageTitle();

    /**
     * Effectue le travail 'SPECIFIQUE' au Controlleur.
     * @throws Exception Propage toutes les Exceptions au Controller parent.
     */
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
        try {

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

            // Nettoie les données saisies par l'Utilisateur
            $this->sanitize();

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
            $this->log()->info(__FUNCTION__, ['elapsedTime' => $elapsedtime]);
            $this->addViewArg('elapsedTime', "Elapsed time for the request : $elapsedtime seconds");

            // Rend la vue
            $this->renderView();
        } catch (Exception $e) {

            $this->log()->error(__FUNCTION__, ['Exception' => $e->getMessage()]);
            $this->renderView500();
        }
    }

    /** Rends la vue. */
    protected function renderView()
    {
        // Expose à la vue toutes les variables disponibles,
        // sous forme d'un tableau associatif nommé 'args'
        $args = $this->viewArgs;

        $viewFilepath = $this->getView();
        if ($viewFilepath != null) {

            include($_SERVER['DOCUMENT_ROOT'] . '/view/_partial/header_shop.php');
            include($_SERVER['DOCUMENT_ROOT'] . $viewFilepath);
            include($_SERVER['DOCUMENT_ROOT'] . '/view/_partial/footer.php');

            exit();
        }

        // Fournit par défaut une réponse au format json de 'args'
        // NOTE la méthode peut être redéfinie pour préciser le contenu de la réponse
        header('Content-Type: application/json');
        echo json_encode($args);
    }

    /** Rends la vue d'erreur interne. */
    protected function renderView500()
    {
        $args['pageTitle'] = 'Erreur interne';

        include($_SERVER['DOCUMENT_ROOT'] . '/view/_partial/header_shop.php');
        include($_SERVER['DOCUMENT_ROOT'] . '/view/_error/500.php');
        include($_SERVER['DOCUMENT_ROOT'] . '/view/_partial/footer.php');
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

            header('Location: /auth/login-display');
        }
    }
    /**
     * Quand l'Utilisateur loggé doit posséder un Rôle particulier,
     * le redirige vers la page de login.
     */
    private function guardHasUserRole($codeRole)
    {
        if ($codeRole != null && $_SESSION['user']['codeRole'] !== $codeRole) {

            header('Location: /auth/login-display');
        }
    }


    /**
     * Applique à toutes les entrées de type 'String' de la requête de l'Utilisateur (GET/POST) les traitements suivants :
     * - htmlspecialchars() pour se protéger des injections javascript (XSS)
     * - trim() pour retirer les éventuels espaces devant et derrière
     * 
     * WARN La fonction ne concerne _que_ les entrées de type 'String'.
     * 
     * NOTE La fonction est très 'naïve', et peut être rédéfinie pour un usage plus spécifique.
     */
    protected function sanitize()
    {
        // Traite les entrées qui proviennent de $_GET et $_POST (tableaux associatifs)
        $rawInputs = array_merge($_GET, $_POST);
        foreach ($rawInputs as $rawInputKey => $rawInputValue) {

            // Concerve la clé inchangée
            $inputKey = $rawInputKey;

            // Par défaut, la valeur reste inchangée
            // Si la valeur est une chaine de caractères, applique les traitements (ou 'filtres')
            $inputValue = $rawInputValue;
            if (is_string($inputValue)) {

                $inputValue = htmlspecialchars($inputValue);
                $inputValue = trim($inputValue);
            }

            // Ajoute la correspondance clé/valeur au tableau des entrées utilisateur 'nettoyées'
            $this->inputs[$inputKey] = $inputValue;
        }

        $this->log()->info(__FUNCTION__, ['inputs' => $this->inputs]);
    }
}
