<?php
    //schema fichier
    //echo __DIR__;

    function debugF($var, $title = null, $exit = false)
    {
        echo '<h2>'.$title.'</h2><pre>'.var_export($var,true);
        
        if ($exit)
            exit;
    }
    function Autoload($classname)
    {
        $filename = (__DIR__.'/Models/'.$classname.'.php');

        if (is_file($filename)) {
            require_once $filename;
        }
        else {
            exit('Erreur fatale (autoload)');
        }
        //fichier ou repertoir
        // if (is_file($filename) || is_dir($filename)) {
            
        // }
    }
    
    //require_once __DIR__. '/Models/DbConection.php';
    spl_autoload_register('Autoload');

    //::operateur de resolution de portee(Paamayim nekudotayim)
    // $db = DbConnection::getInstance();

    // var_dump($db);
    // echo'<hr>';
    // var_export($db);

    $myUser = new User();
    $myUser->Mail_User = "test12@domaine.fr";
    $myUser->UserRight_User = "123";
    $myUser->Avatar_User = "monAvatar23";
    $myUser->Cred_User = "1023";
    $myUser->Victory_User = "9923";
    $myUser->Loss_User = "323";
    $myUser->Pseudo_User = "Mike23";
    $myUser->Password_User = "qwerty23";
    $myUser->Exp_Pool_User = "10023";   

    $users = new Users();

    //$lastId = $users->insert($myUser);

 
    $result2 = $users->selectAll();
    //echo '<pre>'.var_export($result2,true);




    //$result = json_encode($users->select(1));
    $result = $users->select(2);
    //echo $result['Id_User'];
    //echo $result->Id_User;

    //echo '<pre>'.var_export($result,true);


    //echo $users->delete(1);

    ?>
    <?php
    //Rassembler les functions communes dans un fichier"function.php"
    //Creation d'un layout
    //Utilisation des pseudos frames
    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1>Bonjour</h1>
        <?php
            $page =!empty($_GET['page']) ? basename($_GET['page']) : 'login';

            /**
             * 
             */
            $path = (__DIR__.'/Views/'.$page.'.php');

            if (is_file($path)) {
                require ($path);
            }
            else {
                echo 'La page demandée n\'existe pas ou a été déplacée';
            }


        ?>
    </body>
    </html>