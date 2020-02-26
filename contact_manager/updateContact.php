<?php
require_once('contactManager.php');
require_once('contact.php');

$contactManager =  new contactManager();

$contact = $contactManager->read($_POST['id']);

$contact->setNom($_POST['lastName']);
$contact->setPrenom($_POST['firstName']);
$contact->setTel($_POST['phone']);
$contact->setMail($_POST['mail']);

$executeIsOk = $contactManager->save($contact);

if ($executeIsOk) {
    $message = 'Le contact a été modifié';
} else {
    $message = 'Le contact n\'a pas été modifié';
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mise à jour d'un contact</title>
</head>

<body>
    <h1>Mise à jour d'un contact</h1>
    <p><?= $message ?></p>
    <p><a href="readAllContact.php">Lister les contacts</a></p>
    <p><a href="summary.html">Retour au sommaire</a></p>
</body>

</html>