<?php

session_start();
require_once 'Loader.php';
require_once 'Debug.php';
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
    <title>Entreprises</title>
</head>

<body>
    <fieldset>
        <legend>Formulaire inscription entreprises</legend>
        <form action="result.php" method="POST">
            <input type="hidden" name="id">
            <label for="name">Nom de l'entreprise : </label>
            <input type="text" name="name" id="name">
            <br>
            <label for="city">Ville : </label>
            <input type="text" name="city" id="city">
            <br>
            <label for="phone">Téléphone : </label>
            <input type="text" name="phone" id="phone">
            <br>
            <input type="submit" value="Add Entreprise">

        </form>
    </fieldset>
</body>

</html>