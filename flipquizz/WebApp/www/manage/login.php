<?php

use Models\AccountManager;

session_start();

if (!empty($_SESSION['user'])) {
    header('location: index.php');
}

require_once dirname(__DIR__, 2) . '/Loader.php';
require_once dirname(__DIR__, 2) . '/Debug.php';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    //securise les donnes
    $username = basename($_POST['username']);
    $password = $_POST['password'];

    $accounts = new AccountManager;

    if ($accounts->login($username, $password)) {
        $_SESSION['user'] = $username;
        header('location: index.php');

        //obligatoir de arreter le script pour ne pas continuer
        exit;
    } else {
?>
        <div class="console">
            <?php echo 'Username or password invalid'; ?>
        </div>
<?php

    }
}

?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/manage.css">
    <title>Authentication</title>
</head>
<style>

</style>

<body class="login">
    <fieldset class="form_login">
        <legend>Login</legend>

        <form action="" method="post">
            <label for="username"><span>Username * </span>
                <input type="text" name="username" id="username"></label>
            <label for="password"><span>Password * </span>
                <input type="password" name="password" id="password"></label>
            <input type="submit" value="Sign in">
        </form>

    </fieldset>

</body>

</html>