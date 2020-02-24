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
    <link rel="stylesheet" href="style.css">
    <title>Formulaire contact</title>
</head>

<body>
    <h1>Formulaire d'inscription</h1>
    <fieldset>
        <legend>Ajouter un nouveau contact</legend>
        <?php
        if (!empty($_GET['edit'])) {
            $userEdit = basename($_GET['edit']);

            $formulaireContact = new FormulaireManager;

            $contactEdit = $formulaireContact->updateContact($userEdit);

            if (empty($userEdit)) {
                header('location: index.php');
            }

        ?>
            <form action="#" method="post">
                <label for="name"><span>Nom / Prenom *</span>
                    <input type="text" name="name" id="name" value="<?= $contactEdit['name'] ?>"></label>
                <label for="password"><span>Mot de passe *</span>
                    <input type="password" name="password" value="<? $contactEdit['password'] ?>"></label>
                <label for="email"><span>Email *</span>
                    <input type="email" name="email" value="<? $contactEdit['email'] ?>"></label>
                <input type="submit" value="Edit Contact">
            </form>

        <?php
        } else {
        ?>
            <form action="formulaire_add_save.php" method="post">
                <label for="name"><span>Nom / Prenom *</span>
                    <input type="text" name="name" id="name"></label>
                <label for="password"><span>Mot de passe *</span>
                    <input type="password" name="password"></label>
                <label for="email"><span>Email *</span>
                    <input type="email" name="email"></label>
                <input type="submit" value="Add Contact">
            </form>
        <?php
        }
        ?>

    </fieldset>

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

            $contact = new Formulaire;

            foreach ($contact->selectAll() as $contact) {
            ?>
                <tr>
                    <td><?= $contact['contact_name'] ?></td>
                    <td><?= $contact['contact_email'] ?></td>
                    <td><a href="#" data-username="<?= $contact['contact_name'] ?>">Editer</a></td>
                    <td><a href="formulaire_delete.php?id=<?=$contact['contact_id'] ?>" data-name="<?=$contact['contact_name'] ?>">Supprimer</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </fieldset>


</body>

</html>