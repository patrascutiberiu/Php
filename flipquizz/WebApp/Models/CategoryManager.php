<?php

namespace Models;

class CategoryManager extends Categories{
    
    /**
     * @var PDO
     */
    protected $db;

    public function addCategory(array $_newCategory) :bool
    {
        $sql = "INSERT INTO fp_categories (category_name, category_description, quiz_id)
        VALUES ( :category_name, :category_description, :quiz_id);";

        $stmt = $this->pdo->prepare($sql);

        if ($stmt->execute($_newCategory)) {
            return $stmt->rowCount() > 0;
        }
        return false;
    }

    public function getCategoryQuiz()
    {
        $sql = "SELECT fp_categories.*, fp_quizzes.quiz_theme FROM fp_categories INNER JOIN fp_quizzes on fp_categories.quiz_id = fp_quizzes.quiz_id";

        return $this->pdo->query($sql)->fetchAll();
    }
}