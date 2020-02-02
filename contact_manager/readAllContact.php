<?php
require_once('contactManager.php');
require_once('contact.php');


//rec des contacts

$contactManager = new contactManager();

$contacts = $contactManager->readAll();

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lister les contacts</title>
</head>
<body>
    <h1>Lister les contacts</h1>

    <?php if(empty($contacts)) :?>
    <p>Il n'y a pas des contacts</p>
    <?php else :?>
        <?php if($contacts === false) :?>
            <p>Une erreur est survenue</p>
        <?php else :?>
            <ul>
                <?php foreach($contacts as $contact) :?>
                    <li>
                        <?= $contact->getNom() ?>
                        ---
                        <?= $contact->getPrenom() ?>
                        ---
                        <?= $contact->getTel() ?>
                        ---
                        <?= $contact->getMail() ?>---
                        <a href="form_update_contact.php?id=<?= $contact->getId()?>">Modifier</a>---
                        <a href="deleteContact.php?id=<?= $contact->getId()?>">Suprimer</a>
                    </li>
                <?php endforeach;?>
            </ul>
        <?php endif;?>
    <?php endif;?>
    <p><a href="summary.html">Retour au sommaire</a></p>
</body>
</html>
