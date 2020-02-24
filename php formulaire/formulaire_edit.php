<?php

session_start();

require_once 'Loader.php';
require_once 'Debug.php';

$formulaire = new FormulaireManager;

$contact = $_GET['edit'] ?? null;
d($contact);
if (!empty($contact)) {
    if ($formulaire->updateContact($contact)) {
        echo "1";
        exit;
    }
}

header('location: index.php');
