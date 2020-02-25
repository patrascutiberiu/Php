<?php
session_start();

require_once 'Loader.php';
require_once 'Debug.php';

$contact = new Contact;

$vars = [
    'contact_id' => $_POST['id'] ?? null,
    'contact_name' => $_POST['name'] ?? null,
    'contact_password' => $_POST['password'] ?? null,
    'contact_email' => $_POST['email'] ?? null,
];

if ($contact->update($vars)) {
    $_SESSION['success'] = "Contact edité !";
} else {
    $_SESSION['error'] = "Erreur editer de contact !";
    header('location: index.php');
    exit;
}

header('location: index.php');
