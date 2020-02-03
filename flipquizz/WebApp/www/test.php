<?php
//php langage interpreter
//require leve une erreure fatale et s'arrete
//include leve une exception et apres continuer le code
//si on savais pas on utilise require once
//../dans le repertoire parent

use Models\Model;
use Models\Quizzes;

require_once '../Debug.php';
require_once '../Loader.php';

//rien s'executera apres le exit
//exit;

//.htaccess .htpasswd

//commancer par . = cache
// if(!empty($_GET['url']))
// {
//     echo $_GET['url'];
    
//     //sépare une chaine en plusieurs éléments et les stocke dans un tableau associatif
//     $url = explode('/',$_GET['url']);

//     //var_export($url);
//     //ransamble les valeurs d'un tableau en une chaine de caractères
//     //$str = implode('/', $url);
//     d($url);

// }
// else{
//     echo 'Pas de variable dans l\'url';
// }

// $router = new Router();

// d($router);

// // \ our acceder le nom de fichier c'est comme models.db
// $db = Models\Db::getInstance();

// d($db);

// $result = Models\Quizzes::getQuizzes();

// d($result);

// $result = json_encode($result);

// d($result);

// $result = Models\Quizzes::getQuiz(1);

// d($result);

// $result = Models\Questions::getQuestion(1);

// d($result);

// $result = Models\Categories::getCategory(1);

// d($result);

// $quizzes = new Models\Quizzes();

// d($quizzes);

// $result = $quizzes->get(1);
// d($result);

// $result = $quizzes->getAll();
// d($result);


// $categorie = new Models\Categories();

// $result = $categorie->get(1);
// d($result);

// $result = $categorie->getAll();
// d($result);

// $result= $categorie->getQuizCategories(1);
// d($result);

$question = new Models\Questions();
$result =$question->getCategoryQuestions(1);
d($result);

// $result = $question->get(1);
// d($result);

// $result = $question->getAll();
// d($result);