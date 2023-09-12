<?php



require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/user/user.php');

use Monolog\Logger;

/** Traite le formulaire de login. */
class Login extends Ctrl
{
    /** @Override */
    function log(): Logger
    {
        return Log::getLog(__CLASS__);
    }

    /** @Override */
    function getPageTitle()
    {
        return null;
    }

    /** @Override */
    function do()
    {


        // $_SESSION['cart'] = [];
        // Quand l'Utilisateur est enregistré,
        // l'enregistre en session et le redirige vers la page d'accueil
        $user = $this->getUser();
if ($user !== null) {
    // Vérifie le mot de passe
    $passwordCandidate = $this->inputs['password'];
    $isRegistred = password_verify($passwordCandidate, $user['password']);
}
        
        // Quand l'Utilisateur est enregistré,
        // l'enregistre en session et le redirige vers la page d'accueil
        if ($isRegistred) {
        
            $_SESSION['user'] = $user;
        
            header('Location: /');
            exit;
        }
    
        // Par défaut,
        // redirige l'Utilisateur vers la page de 'login' avec un message d'information
        $_SESSION['msg_info'] = 'Nom d\'utilisateur inconnu.';
        header('Location: /auth/login-display');

       
    }

    /** Retourne l'éventuel Utilisateur connecté. */
    private function getUser()
    {
        $email =  $this->inputs['email'];
        $password =  $this->inputs['password'];

        $user = LibUser::find($email, $password);

        return  $user;
    }

    /** @Override */
    function getView()
    {
        return null;
    }
}

$ctrl = new Login();
$ctrl->execute();
