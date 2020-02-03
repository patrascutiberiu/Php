<?php

require_once '../Debug.php';
require_once '../Loader.php';

//
$table = $_GET['t'] ?? null;

if ($table === null) {
    exit('Welcome /!\\');
}

$mapping = [
  'categories'  => 'Models\\Categories',
  'quizzes'     => 'Models\\Quizzes',
  'questions'   =>'Models\\Questions'  
];

//basename prendre la derniere partie de url
$table = basename($table);

if (!array_key_exists($table,$mapping)) {
    exit('Muhahahahaaaa');
}

//$mapping['categories']

if (empty($mapping[$table])) {
    exit('Muhahahahaaaa');
}

$table = $mapping[$table];

$table = new $table();

//d($table);

$id = $_GET['id'] ?? 0;

$id = (int)$id;

//ne plente jamais envoye 0
$id = intval($id);

if ($id > 0) {
    $result = $table->get($id);
}
else{
    $result = $table->getAll();
}


$result = json_encode($result, JSON_PRETTY_PRINT);

//mettre le server en pause
//sleep(5);

//spit out 
exit($result);