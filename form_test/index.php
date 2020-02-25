<?php

session_start();
require_once 'Loader.php';

if (!empty($_SESSION['error'])) {
?>
    <div class="console">
        <?= $_SESSION['error']; ?>
    </div>

    <?php
    //toujour mettre a null pour vider la session
    ?>
    <?= $_SESSION['error'] = null; ?>
<?php
}

if (!empty($_SESSION['success'])) {
?>
    <div class="console">
        <?= $_SESSION['success']; ?>
    </div>
<?php
    $_SESSION['success'] = null;
}

?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Formulaire contact</title>
</head>

<body>
    <h1>Formulaire d'inscription</h1>
    <form action="formulaire_add_save.php" method="post">
        <label for="name"><span>Nom / Prenom *</span>
            <input type="text" name="name" id="name"></label>
        <label for="password"><span>Mot de passe *</span>
            <input type="password" name="password"></label>
        <label for="email"><span>Email *</span>
            <input type="email" name="email"></label>
        <input type="submit" value="Add Contact">
    </form>

    <fieldset>
        <legend>Liste avec les contacts</legend>

        <table>
            <thead>
                <tr>
                    <th>Nom / Prenom</th>
                    <th>Email</th>
                    <th>Edition</th>
                    <th>Supression</th>
                </tr>
            </thead>
            <?php

            $contact = new Contact;

            foreach ($contact->getAll() as $contact) {
            ?>
                <tr>
                    <td><?= $contact['contact_name'] ?></td>
                    <td><?= $contact['contact_email'] ?></td>
                    <form action="index.php" method="GET">
                        <td><a href="index.php?id=<?= $contact['contact_id']; ?>&name=<?= $contact['contact_name']; ?>&password=<?= $contact['contact_password']; ?>&email=<?= $contact['contact_email']; ?>">Editer</a>
                            <input type="submit" id="Edit" value="Edit">
                        </td>
                    </form>
                    <form action="formulaire_delete.php" class="form" method="GET">
                        <td><a href="formulaire_delete.php?id=<?= $contact['contact_id'] ?>">Supprimer</a></td>
                        <!-- <td><input type="submit" id="delete" value="Delete"></td> -->
                    </form>
                </tr>
            <?php
            }
            ?>
        </table>
    </fieldset>