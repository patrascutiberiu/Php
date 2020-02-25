<?php

session_start();

require_once 'Loader.php';
require_once 'Debug.php';

$formulaire = new FormulaireManager;

$id = $_POST['id'] ?? null;
$name = $_POST['name'] ?? null;
$password = $_POST['password'] ?? null;
$email = $_POST['email'] ?? null;

if (!empty($id)) {

    if (!$formulaire->updateContact($id, $name, $password, $email)) {
        $_SESSION['success'] = "Contact edité !";
    } else {
        $_SESSION['error'] = "Erreur editer de contact !";
        header('location: index.php');
        exit;
    }
}

header('location: index.php');
