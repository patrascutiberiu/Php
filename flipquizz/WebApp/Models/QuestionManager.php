<?php

namespace Models;

class QuestionManager extends Questions
{
    /**
     * @var PDO
     */
    protected $db;

    public function addQuestion(array $_newQuestion): bool
    {
        $sql = "INSERT INTO fp_questions (question_content, question_answer, question_level, category_id)
        VALUES ( :question_content, :question_answer, :question_level, :category_id);";

        $stmt = $this->pdo->prepare($sql);

        if ($stmt->execute($_newQuestion)) {
            return $stmt->rowCount() > 0;
        }
        return false;
    }
    public function getLatestQuestions(int $_nb_limit = 20)
    {
        $stmt = $this->pdo->query("SELECT fp_questions.* FROM fp_questions 
        INNER JOIN fp_categories on fp_questions.category_id = fp_categories.category_id
        INNER JOIN fp_quizzes ON fp_categories.quiz_id = fp_quizzes.quiz_id
        ORDER BY category_id
        DESC LIMIT " . $_nb_limit . ";")->fetchAll();

        return $stmt;
    }
}
