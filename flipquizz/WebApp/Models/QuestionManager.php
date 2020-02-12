<?php
namespace Models;

class QuestionManager extends Questions
{
    /**
     * @var PDO
     */
    protected $db;

    public function addQuestion(array $_newQuestion) : bool{
        $sql = "INSERT INTO fp_categories (question_content, question_answer, question_level, category_id)
        VALUES (:question_content, :question_answer, :question_level, :category_id);";
        
        $stmt = $this->pdo->prepare($sql);

        if ($stmt->execute($_newQuestion)) {
            return $stmt->rowCount() >0;
        } 
        return false;
    }
}
