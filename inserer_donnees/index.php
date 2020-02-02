<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <H1>Ajouter un contact</H1>
    <form action="insertion.php" method="POST" class="formulaire">

        <p>
            <label for="nom">Nom</label>
            <input type="text" name="lastName" id="nom" required>
        </p>

        <p>
            <label for="prenom">Prenom</label>
            <input type="text" name="firstName" id="prenom" required>
        </p>

        <p>
            <label for="tel">Téléphone</label>
            <input type="text" name="phone" id="tel" required>
        </p>

        <p>
            <label for="mail">Adresse électronique</label>
            <input type="email" name="mail" id="mail" required>
        </p>

        <p><input type="submit" value="Enregistrer"></p>

    </form>

</body>
</html>