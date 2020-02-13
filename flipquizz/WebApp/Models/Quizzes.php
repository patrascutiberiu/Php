<?php

namespace Models;

//une ligne vide entre balise php et namespace, apres le namespace 2lignes et après la clase
class Quizzes extends Model
{
    //premiere methode qui se repete 
    // //static plus rapide que object
    // public static function getQuizzes(){
    //     $sql = "SELECT * FROM fp_quizzes;";

    //     $pdo = Db::getInstance();
    //     //querry uniquement avec select envoie la requette vide
    //     $statement = $pdo->query($sql);

    //     $result = $statement->fetchAll();

    //     return $result;

    // }

    public static function getQuiz($id)
    {
        //:id = marker 
        $sql = "SELECT * FROM fp_quizzes WHERE quiz_id=:id;";
        //preparer requette en attants requette en cash
        $stmt = Db::getInstance()->prepare($sql);

        $vars = [
            ':id' => $id
        ];

        $stmt->execute($vars);

        //rec de resultat
        $result = $stmt->fetch();

        //fermer les courseur de la requette !! obligatoire

        $stmt->closeCursor();

        return $result;
    }

    public function __construct()
    {
        parent::__construct('fp_quizzes', 'quiz_id');
    }

    public static function insertQuiz(array $quiz)
    {
        $sql = "INSERT INTO fp_quizzes (quiz_theme, quiz_textcolor, quiz_backcolor)
        VALUES(:quiz_theme, :quiz_textcolor, :quiz_backcolor);";

        $stmt = Db::getInstance()->prepare($sql);

        $vars = [
            ':quiz_theme' => $quiz['quiz_theme'],
            ':quiz_textcolor' => $quiz['quiz_textcolor'],
            ':quiz_backcolor' => $quiz['quiz_backcolor']
        ];

        $stmt->execute($vars);

        $result = $stmt->fetch();

        $stmt->closeCursor();

        return $result;
    }

    public static function updateQuiz(array $quiz)
    {
    }

    public function getLatest()
    {
        //limite recuperer 1 seul result
        $stmt = $this->pdo->query("SELECT * FROM " . $this->tableName . " ORDER BY " . $this->primaryKey . " DESC LIMIT 1;")->fetch();

        return $stmt;
    }
}
