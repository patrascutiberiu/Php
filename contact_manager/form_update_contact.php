<?php
require_once('contactManager.php');
require_once('contact.php');

$contactManager = new contactManager();

$contact = $contactManager->read($_GET['id']);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update un contact</title>
</head>
<body>
<h1>Update un contact</h1>
    <p><a href="summary.html">Retour au sommaire</a></p>
    <form action="updateContact.php" method="post">

        <p>
            <label for="nom">Nom</label>
            <input type="text" name="lastName" id="nom" required value="<?= $contact->getNom() ?>">
        </p>

        <p>
            <label for="prenom">Prenom</label>
            <input type="text" name="firstName" id="prenom" required value="<?= $contact->getPrenom() ?>">
        </p>

        <p>
            <label for="nom">Tel</label>
            <input type="text" name="phone" id="tel" required value="<?= $contact->getTel() ?>">
        </p>

        <p>
            <label for="mail">Mail</label>
            <input type="email" name="mail" id="mail" required value="<?= $contact->getMail() ?>">
        </p>

        <input type="hidden" name="id" value="<?= $contact->getId() ?>">
        <p>
            <input type="submit" value="Ajouter le contact" required >
        </p>

    </form>
</body>
</html>