<?php

session_start();

require_once 'Loader.php';
require_once 'Debug.php';

$formulaire = new FormulaireManager;

$contact = $_POST['name'] ?? null;
d($contact);
if (!empty($contact)) {
    if ($_SESSION['name'] === $contact) {
        echo "0";
        exit;
    }

    if ($formulaire->removeContact($contact)) {
        echo "1";
        exit;
    }
}

echo "afara";
