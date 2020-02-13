<?php

namespace Models;

class QuizManager extends Quizzes
{
    /**
     * @var PDO
     */
    protected $db;

    public function addQuiz(array $_newQuiz): bool
    {
        $sql = "INSERT INTO fp_quizzes (quiz_theme, quiz_textcolor, quiz_backcolor)
        VALUES (:quiz_theme, :quiz_textcolor, :quiz_backcolor);";

        $stmt = $this->pdo->prepare($sql);

        if ($stmt->execute($_newQuiz)) {
            return $stmt->rowCount() > 0;
        }
        return false;
    }

    public function getQuizCat(){
        $sql = "SELECT fp_quizzes.quiz_theme FROM fp_quizzes INNER JOIN fp_categories on fp_quizzes.quiz_id = fp_categories.quiz_id;";
        return $this->pdo->query($sql)->fetchAll();
    }

    // public function removeQuiz(){

    // }

    // public function updateQuiz(){

    // }


}
