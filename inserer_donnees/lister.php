<?php
//ouverture d'une connexion à la bdd
$objPdo= new PDO('mysql:host=localhost;dbname=agenda','root','');

//préparation de la requête
$pdoStatement=$objPdo->prepare('SELECT * FROM contact ORDER BY prenom ASC');

//exécution de la requête
$executeIsOk= $pdoStatement->execute();

//récupération des résultats
$contats= $pdoStatement->fetchAll();

// echo '<pre>';
// var_dump($contats);
// echo '</pre>';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lister des contacts</title>
</head>
<body>
    <h1>Lister des contacts</h1>
    
    <ul>
        <?php foreach($contats as $contact):?>
            <li>
                <?= $contact['nom']?>
                -
                <?= $contact['prenom']?>
                -
                <?= $contact['tel']?>
                -
                <?= $contact['mail']?>---
                <a href="supprimer.php?numContact=<?= $contact['id'] ?>">Supprimer</a>---
                <a href="form_modification.php?numContact=<?= $contact['id'] ?>">Modifier</a>
            </li>
        <?php endforeach;?>
    </ul>
</body>
</html>