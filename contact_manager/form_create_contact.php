<?php
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter un contact</h1>
    <p><a href="summary.html">Retour au sommaire</a></p>
    <form action="createContact.php" method="post">

        <p>
            <label for="nom">Nom</label>
            <input type="text" name="lastName" id="nom" required>
        </p>

        <p>
            <label for="prenom">Prenom</label>
            <input type="text" name="firstName" id="prenom" required>
        </p>

        <p>
            <label for="nom">Tel</label>
            <input type="text" name="phone" id="tel" required>
        </p>

        <p>
            <label for="mail">Mail</label>
            <input type="email" name="mail" id="mail" required>
        </p>

        <p>
            <input type="submit" value="Ajouter le contact" required>
        </p>

    </form>
</body>
</html>