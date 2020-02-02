<?php

$objPdo= new PDO('mysql:host=localhost;dbname=agenda','root','');

$pdoStatement=$objPdo->prepare('SELECT * FROM contact WHERE id= :num');

$pdoStatement->bindValue(':num',$_GET['numContact'], PDO::PARAM_INT);

$execIsOk =$pdoStatement->execute();

$contact =$pdoStatement->fetch();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification</title>
</head>

<body>
    <h1>Modifier un contact</h1>
    <form action="modifier.php" method="POST" class="formulaire">

    <input type="hidden" name="numContact" value="<?= $contact['id'] ?>">

        <p>
            <label for="nom">Nom</label>
            <input type="text" name="lastName" id="nom" required value="<?= $contact['nom'];?>">
        </p>

        <p>
            <label for="prenom">Prenom</label>
            <input type="text" name="firstName" id="prenom" required value="<?= $contact['prenom'];?>">
        </p>

        <p>
            <label for="tel">Téléphone</label>
            <input type="text" name="phone" id="tel" required value="<?= $contact['tel'];?>">
        </p>

        <p>
            <label for="mail">Adresse électronique</label>
            <input type="email" name="mail" id="mail" required value="<?= $contact['mail'];?>">
        </p>

        <p><input type="submit" value="Enregistrer"></p>

    </form>
</body>

</html>