<?php
session_start();
require_once 'Loader.php';

if (empty($_POST['name']) && empty($_POST['password']) && empty($_POST['email'])) {
    $_SESSION['error'] = "Toutes les information sont obligatoires";
    header('location: index.php');
    exit();
}

// if (strlen($_POST['name'] < 3)) {
//     $_SESSION['error'] = "Le nom doit correspondre à minimum 3 caractères !";
//     header('location: index.php');
//     exit();
// }

$regex_name = '/^[a-z0-9\.-_]{4}/$i';

if (preg_match($regex_name, $_POST['name'])) {
    $_SESSION['error'] = "Le nom doit contenir minimum 4 caractères !";
    header('location: index.php');
    exit();
}

$regex_password = '/^[a-zA-Z0-9 \./*-+_@!:;,]{4,20}$/';
if (preg_match($regex_password, $_POST['password'])) {
    $_SESSION['error'] = "Le password doit contenir minimum 4 caractères !";
    header('location: index.php');
    exit();
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "L'email doit corespondre au format mail !";
    header('location: index.php');
    exit();
}

$nouveauContact = [
    'contact_name' => $_POST['name'],
    'contact_password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
    'contact_email' => $_POST['email']
];

$contact = new Contact;

if ($contact->insert($nouveauContact)) {
    $_SESSION['success'] = "Contact ajouté !";
} else {
    $_SESSION['error'] = "Erreur ajout de contact !";
}

header('location: index.php');
