<?php

namespace controllers;

use controllers\base\Web;
use utils\Template;

class SampleWeb extends Web
{
    function home()
    {
        Template::render("views/global/home.php", array("date" => date("d-m-Y à H:i")));
    }

    function About()
    {
        Template::render("views/global/about.php",array("titre" => "à propos", "date"=>date("d-m-Y à H:i")));
    }
}