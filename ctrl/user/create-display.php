<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/user/user.php');

use Monolog\Logger;

/** Affiche le formulaire de création d'un Utilisateur. */
class UserCreateDisplay extends Ctrl
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
    function requireRole()
    {
        return 'GEST';
    }

    /** @Override */
    function getPageTitle()
    {
        return 'Nouvel Utilisateur';
    }

    /** @Override */
    function do()
    {
        // Liste les Rôles et les exposent à la vue
        $listRole = LibUser::listRole();
        $this->addViewArg('listRole', $listRole);
    }

    /** @Override */
    function getView()
    {
        return '/view/user/create-display.php';
    }
}

$ctrl = new UserCreateDisplay();
$ctrl->execute();
