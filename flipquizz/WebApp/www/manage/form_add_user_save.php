<?php
//il est appele apart et on a besoin pour charger la page
session_start();

use Models\AccountManager;

require_once dirname(__DIR__, 2) . '/Loader.php';
require_once dirname(__DIR__, 2) . '/Debug.php';

//d($_POST);

$return_url = 'index.php?page=users';

if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    //ajoout des heder dans le fichier
    //location dirije vers n'import quel fichier
    //les sesion sont stoque sur server et cooqie cote client
    $_SESSION['error'] = 'Le formulaire est incomplet !';
    header('location: ' . $return_url);
    exit;
}


$username = basename($_POST['username']);

$password = $_POST['password'];

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);


if ($email === false) {
    $_SESSION['error'] = 'Le format email est invalide !';
    header('location: ' . $return_url);
    exit;
}

$accounts = new AccountManager();

if ($accounts->addUser($username, $password, $email)) {
    $_SESSION['success'] = 'Utilisateur ajouté !';
} else {
    $_SESSION['error'] = 'Erreurrrrrr';
    header('location: ' . $return_url);
    exit;
}


header('location: ' . $return_url);
