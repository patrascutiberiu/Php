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
        if (!empty($_GET['id'])) {
            $id = basename($_GET['id']);
            $userEditName = basename($_GET['name']);
            $userEditPassword = basename($_GET['password']);
            $userEditEmail = basename($_GET['email']);

            $formulaireContact = new FormulaireManager;

            // $contactEdit = $formulaireContact->updateContact($userEdit,$userEditName,$userEditPassword,$userEditEmail);

            if (empty($id)) {
                header('location: index.php');
            }

        ?>
            <form action="formulaire_edit.php" method="get">
                <input type="hidden" name="id" id="name" value="<?= $id ?>">
                <label for="name"><span>Nom / Prenom *</span>
                    <input type="text" name="name" id="name" value="<?= $userEditName ?>"></label>
                <label for="password"><span>Mot de passe *</span>
                    <input type="password" name="password" value="<?= $userEditPassword ?>"></label>
                <label for="email"><span>Email *</span>
                    <input type="email" name="email" value="<?= $userEditEmail ?>"></label>
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

                    <form action="index.php" method="GET">
                        <td><a href="index.php?id=<?= $contact['contact_id'];?>&name=<?= $contact['contact_name'];?>&password=<?= $contact['contact_password'];?>&email=<?= $contact['contact_email'];?>">Editer</a></td>
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
    <script>
        // window.addEventListener("DOMContentLoaded" , function(){
        //     document.querySelector('#delete').addEventListener('click', function(){
        //         document.querySelector('.form').setAttribute("methode","get");
        //         document.querySelector('.form').submit();
        //     });
        // });
    </script>

</body>

</html>