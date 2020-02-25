<?php
require_once 'Debug.php';
require_once 'Loader.php';

$contact = new Contact;

$contactDelete = $_GET['id'] ?? null;

if (!empty($contactDelete)) {
    if ($contact->delete($contactDelete)) {
        $_SESSION['success'] = "Contact supprimé !";
    }else {
        $_SESSION['error'] = "Erreur suppression de contact !";
        header('location: index.php');
        exit;
    }
}
header('location: index.php');