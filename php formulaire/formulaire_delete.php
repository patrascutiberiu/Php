<?php

session_start();

require_once 'Loader.php';
require_once 'Debug.php';

$formulaire = new FormulaireManager;

$contact = $_GET['id'] ?? null;


if (!empty($contact)) {
    if ($formulaire->removeContact($contact)) {
        echo "1";
        exit;
    }
}

header('location: index.php');
