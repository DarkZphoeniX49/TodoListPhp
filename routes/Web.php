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
        Route::Add('/conn',[$todo,'connexion']);
        Route::Add('/todo/liste', [$todo, 'liste']);
        Route::Add('/todo/ajouter', [$todo, 'ajouter']);
        Route::Add('/todo/terminer', [$todo, 'terminer']);
        Route::Add('/todo/supprimer', [$todo, 'suppr']);
        Route::Add('/sample/{id}', [$main, 'sample']);

        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
     if (SessionHelpers::isLogin()) {
        Route::Add('/logout', [$main, 'home']);
        }
    }
}

