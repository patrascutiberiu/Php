<?php

session_start();

require_once 'Loader.php';
require_once 'Debug.php';

$formulaire = new FormulaireManager;

$id = $_GET['id'] ?? null;
$name = $_GET['name'] ?? null;
$password = $_GET['password'] ?? null;
$email = $_GET['email'] ?? null;

//d($_GET);

 if (!empty($id)) {
    if ($formulaire->updateContact($id,$name,$password,$email)) {
        echo "1";
        header('location: index.php');
       
    }
    else{
        echo 'error';
    }
}


