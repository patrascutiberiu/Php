<?php
session_start();

//on n'est pas charger la page si l'utilisateur n'est pas autenthentifier
if (empty($_SESSION)) {
    header(('location: login.php'));
    exit;
}
require_once dirname(__DIR__, 2) . '/Loader.php';
require_once dirname(__DIR__, 2) . '/Debug.php';



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/manage.css">
    <script src="../js/manage.js"></script>
    <title>Index</title>
</head>

<body id="admin">
    <header>
        <h1>Quiz Administration</h1>
    </header>

    <nav>
        <ul>
            <li>
                <a href="?page=users">Users</a>
            </li>
            <li>
                <a href="?page=quizzes">Quizzes</a>
            </li>
            <li>
                <a href="index.php?page=categories">Categories</a>
            </li>
            <li>
                <a href="index.php?page=questions">Questions</a>
            </li>
        </ul>
    </nav>
    <main>
        <?php
        // if (!empty($_GET['page'])) {
        //     $pageParametreGet = $_GET['page'];
        // }
        // else {
        //     $pageParametreGet = $_GET['page'];
        // }

        $pageParametreGet = !empty($_GET['page']) ? $_GET['page'] : 'home';

        //equvalent que la ternaire (null coalescing operator) qui fait le meme chose que avant
        //$pageParametreGet =$_GET['page'] ?? 'home';

        if ($pageParametreGet === 'index') {
            $pageParametreGet = 'home';
        }

        //si page est égal à index, on remplace sa valeur par 'home'
        $pageParametreGet = ($pageParametreGet === 'index') ? 'home' : $pageParametreGet;

        //veruille le fichier pour ne pas sortir de fichier //suprimer tout la partie du schema
        $pageParametreGet = basename($pageParametreGet);

        // // - utile que empty
        // if (!isset($_GET['page'])) {
        //     $pageParametreGet = $_GET['page'];
        // }
        // else {
        //     $pageParametreGet = $_GET['page'];
        // }

        // $pageParametreGet =!isset($_GET['page']) ? $_GET['page'] :'home';

        // if (array_key_exists('page', $_GET)) {

        // }
        //$pageParametreGet = $_GET['page'];

        //concatenatin
        //$pageParametreGet = ($pageParametreGet.'.php');
        $pageParametreGet .= '.php'; //on ajoute .php à la valeur page

        //echo($pageParametreGet);

        if (is_file($pageParametreGet)) {
            //include charger le fichier /copie le code de notre paramettre
            require $pageParametreGet;
        } else {
        ?>
            <div class="console">
                <?= 'The page you are looking for does not exist !'; ?>
            </div>


        <?php
        }

        ?>
    </main>
</body>

</html>