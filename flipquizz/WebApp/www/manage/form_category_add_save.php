<?php

session_start();
require_once dirname(__DIR__, 2) . '/Loader.php';
require_once dirname(__DIR__, 2) . '/Debug.php';

$return_url = "index.php?page=categories";

//verification si il y a des information dans les 
if (empty($_POST['category_name']) && empty($_POST['category_description'])) {
    $_SESSION['error'] = "Information on questions is mandatory";
    header('location: ' . $return_url);
    exit();
}

$newCategory = [
    'category_name' => $_POST['category_name'],
    'category_description' => $_POST['category_description'],
    'quiz_id' => $_POST['quiz_id']
];

$category = new Models\CategoryManager;

if ($category->addCategory($newCategory)) {
    $_SESSION['success'] = "Category added !";
} else {
    $_SESSION['error'] = "Error adding Category";
}

header('location: ' . $return_url);
