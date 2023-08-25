<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/db.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/user/user.php');

use Monolog\Logger;

/** Traite le formulaire de création d'un Utilisateur. */
class UserCreate extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function isRequiredUserLogged()
    {
        return true;
    }

    /** @Override */
    function getPageTitle()
    {
        return null;
    }

    /** @Override */
    function do()
    {
        // Assurez-vous que vous incluez les fichiers nécessaires ici, comme la définition de la classe LibUser et la connexion à la base de données.
    
        // Récupère les données saisies dans le formulaire
        $username = $this->inputs['username'];
        $email = $this->inputs['email'];
        $password = $this->inputs['password'];
        $idRole = $this->inputs['idRole'];
    
        // Crée un hachage sécurisé du mot de passe
      



        // Crée l'utilisateur en utilisant la classe LibUser (hypothétique)
        // Assurez-vous que la classe LibUser a une méthode statique "create" pour créer un utilisateur
        LibUser::create($username, $email,$password, $idRole); // Utilise le hachage du mot de passe
    
        // Redirige l'utilisateur vers la liste des Utilisateurs après la création
        header('Location: /ctrl/auth/login-display.php');
        exit(); // Assurez-vous de sortir du script après la redirection pour éviter toute exécution supplémentaire.
    }
    

    /** @Override */
    function getView()
    {
        return null;
    }
}

$ctrl = new UserCreate();
$ctrl->execute();
