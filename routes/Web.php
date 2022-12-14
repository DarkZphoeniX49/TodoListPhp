<?php

namespace routes;

use routes\base\Route;
use controllers\Account;
use controllers\TodoWeb;
use utils\SessionHelpers;
use controllers\SampleWeb;

class Web
{
    function __construct()
    {
        $main = new SampleWeb();
        $todo = new TodoWeb();
        
        Route::Add('/', [$main, 'home']);
        Route::Add('/about', [$main, 'about']);
        Route::Add('/login',[$main,'login']);
        Route::Add('/conn',[$todo,'connexion']);

        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
     if ($_SESSION['USER']) {
        Route::Add('/logout', [$main, 'home']);
        Route::Add('/todo/liste', [$todo, 'liste']);
        Route::Add('/todo/ajouter', [$todo, 'ajouter']);
        Route::Add('/todo/terminer', [$todo, 'terminer']);
        Route::Add('/todo/supprimer', [$todo, 'suppr']);
        Route::Add('/sample/{id}', [$main, 'sample']);
        }
    }
}

