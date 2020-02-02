<?php
require_once('contactManager.php');
require_once('contact.php');

$contactManager =  new contactManager();

$contact= $contactManager->read($_GET['id']);

$demeteIsOk = $contactManager->delete($contact);

if ($demeteIsOk) {
    $message = 'Le contact a été supprimé';
} else {
    $message = 'Le contact n\'a pas été supprimé';
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Suppresion d'un contact</h1>
    <p><?= $message?></p>
    <p><a href="readAllContact.php">Lister les contacts</a></p>
</body>
</html>
