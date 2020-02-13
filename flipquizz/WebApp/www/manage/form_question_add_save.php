<?php

session_start();
require_once dirname(__DIR__, 2) . '/Loader.php';
require_once dirname(__DIR__, 2) . '/Debug.php';

$return_url = "index.php?page=questions";

//verification si il y a des information dans les 
if (empty($_POST['question_content']) && empty($_POST['question_answer']) && empty($_POST['question_level'])) {
    $_SESSION['error'] = "Information on questions is mandatory";
    header('location: ' . $return_url);
    exit();
}

//lier notre atributs avec les informations envoye en post
$newQuestion = [
    'question_content' => $_POST['question_content'],
    'question_answer' => $_POST['question_answer'],
    'question_level' => $_POST['question_level'],
    'category_id'=> $_POST['category_id']
];

$questions = new Models\QuestionManager;

if ($questions->addQuestion(($newQuestion))) {
    $_SESSION['success'] = "Question Added !";
} else {
    $_SESSION['error'] = "Error adding Question";
}

header('location: ' . $return_url);
