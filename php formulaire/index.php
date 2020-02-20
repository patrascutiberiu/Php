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
    <title>Document</title>
</head>

<body>

    <fieldset>
        <legend>Add new Quiz</legend>
        <form action="formulaire_add_save.php" method="post">
            <label for="name"><span>Name *</span>
                <input type="text" name="name" id="" required></label>
            <label for="password"><span>Password *</span>
                <input type="password" name="password"></label>
            <label for="email"><span>Email *</span>
                <input type="email" name="email"></label>
            <input type="submit" value="Add Contact">
        </form>
    </fieldset>

    <fieldset>
        <legend>Liste avec les contacts</legend>

        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <?php

            $contact = new Formulaire;

            foreach ($contact->selectAll() as $contact) {
            ?>
                <tr>
                    <td><?= $contact['contact_name'] ?></td>
                    <td><?= $contact['contact_email'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </fieldset>
</body>

</html>