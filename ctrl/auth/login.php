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


        $_SESSION['cart'] = [];
        // Quand l'Utilisateur est enregistré,
        // l'enregistre en session et le redirige vers la page d'accueil
        $user = $this->getUser();
        if ($user !== null) {
            $_SESSION['user'] = $user;
            $_SESSION['codeRole'] = $user['codeRole']; 
    
            header('Location: /ctrl/product/list.php');
            exit;
        }
    
        // Par défaut,
        // redirige l'Utilisateur vers la page de 'login' avec un message d'information
        $_SESSION['msg_info'] = 'Nom d\'utilisateur inconnu.';
       
    }

    /** Retourne l'éventuel Utilisateur connecté. */
    private function getUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = LibUser::find($email, $password);

        return  $user;
    }

    /** @Override */
    function getView()
    {
        return '/ctrl/auth/login-display.php';
    }
}

$ctrl = new Login();
$ctrl->execute();
