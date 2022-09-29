<?php
namespace models;

use models\base\SQL;

class TodoModel extends SQL
{
    public function __construct()
    {
        parent::__construct('todos', 'id');
    }

    function marquerCommeTermine($id){
        $stmt = $this->pdo->prepare("UPDATE todos SET termine = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }

    function ajouterTodo($texte)
    {
        $addTodo=$this->pdo->prepare("INSERT INTO `todos` ( `texte`, `termine`) VALUES ( ?, '0'); ");
        $addTodo->execute([$texte]);
    }

    function verifAjout($texte){
        if($texte){
            $this->ajouterTodo($texte);
        }
        else{
            echo "vous n'avez pas rempli le champs !";
        }

    }
    function supprimer($id)
    {
        $verifTermine=$this->pdo->prepare("SELECT termine FROM todos WHERE id=?;");
        $verifTermine->execute([$id]);
        if($verifTermine)
        {
            $deleteToDo=$this->pdo->prepare(" DELETE FROM `todos` WHERE `todos`.`id` =?;");
            $deleteToDo->execute([$id]);
        }
        
        
    }
    /*function hideTermine(){
        $todos=$this->todoModel->getAll();
        foreach($todos as $todo){
            if($todos["termine"])
            {
                return null;
            }
            return $todo;
        }
    }
        */
        function

}