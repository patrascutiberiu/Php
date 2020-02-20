<?php
session_start();
require_once 'Loader.php';

if (empty($_POST['name']) && empty($_POST['password']) && empty($_POST['email'])) {
    $_SESSION['error'] ="information obligatoires";
    header('location: index.php');
}

$nouveauContact = [
    'contact_name' => $_POST['name'],
    'contact_password' => $_POST['password'],
    'contact_email' => $_POST['email']
];

$contact = new FormulaireManager;

if ($contact->addContact($nouveauContact)) {
    $_SESSION['success'] = "Contact ajouté !";
} else {
    $_SESSION['error'] = "Erreur ajout de contact !";
}

header('location: index.php');
