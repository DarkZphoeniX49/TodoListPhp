<?php
namespace controllers;

use utils\Template;
use models\TodoModel;
use controllers\base\Web;


class TodoWeb extends Web
{
    private $todoModel;

    function __construct(){
        $this->todoModel = new TodoModel();
    }

    function liste()
    {
        $todos = $this->todoModel->getAll(); // Récupération des TODOS présents en base.
        Template::render("views/todos/liste.php", array('todos' => $todos)); // Affichage de votre vue.
    }

    function ajouter($texte = "")
    {
        $this->todoModel->ajouterTodo($texte);
        $this->redirect("./liste");
    }
}