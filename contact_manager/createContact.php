<?php
require_once('contactManager.php');
require_once('contact.php');


$contact = new contact();

$contact->setNom($_POST['lastName'])->setPrenom($_POST['firstName'])->setTel($_POST['phone'])->setMail($_POST['mail']);

$contactManager = new contactManager();

$saveIsOk = $contactManager->save($contact);

if ($saveIsOk) {
    $message ='Le contact a été ajouté';
} else {
    $message = 'Le contact n\'a pas été ajouté';
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Insertion d'un contact</h1>
    <p><?= $message?></p>
    <p><a href="summary.html">Retour au sommaire</a></p>
    <p><a href="readAllContact.php">Lister les contacts</a></p>
</body>
</html>
