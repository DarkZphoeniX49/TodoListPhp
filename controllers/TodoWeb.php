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
        $todos = $this->todoModel->getAll();// $this->todoModel->getAll(); // Récupération des TODOS présents en base.
        Template::render("views/todos/liste.php", array('todos' => $todos)); // Affichage de votre vue.
    }

    function ajouter($texte = "")
    {
        $this->todoModel->verifAjout($texte);
        $this->redirect("./liste");
    }

    function terminer($id = "")
    {
        if($id!="") {
            $this->todoModel->marquerCommeTermine($id);

        }
        $this->redirect("./liste");

    }
    function suppr($id=""){
        $this->todoModel->supprimer($id);
        $this->redirect('./liste');
    }

    function connexion($username='',$password=''){
        $result=$this->todoModel->checkLogin($password,$username);
        if($result) {
            $_SESSION['estconnecter']=1;
            $this->redirect('./liste');
        }
        else $this->redirect('./home');
    }

    function sample($id)
{
    echo "Vous consulter l'identifiant $id";
}
}