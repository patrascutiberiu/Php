<?php

    session_start();
    $cnom='prenom';
    $cvaleur='Tib';
    $c2nom='pass';
    $c2valeur='azerty';
    $cnewvaleur='Vali';

    //cookie qui expire dans une heure
    setcookie($cnom,$cvaleur,time()+3600);
    //cookie à l'accès plus sécurisé
    //setcookie($c2nom,$c2valeur,time()+3600*24,"/","tib.com",true,true);

    //modifie la valeur du cookie
    setcookie($cnom, $cnewvaleur,time()+3600);

    //change la date d'expiration du cookie à hier et supprime
    //setcookie($cnom,"",time()-3600*24);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php 
$x=5;
$y=7;

// function somme(){
//     global $x,$y;
//     $z=$x+$y;
//     echo 'somme x + y = '.$z;
// }
// somme();

function somme() {
    $z=$GLOBALS['x']+$GLOBALS['y'];
    echo'Somme x + y = '.$z;

}
somme();

    echo'<br><br>';

    if (!isset($_COOKIE[$cnom])) {
        echo 'Cookie non défini ';
    } else {
        echo 'Nom du cookie : '.$cnom.'<br>';
        echo 'Valeur du coolie : '.$_COOKIE[$cnom];
    }
    
    echo'<br><br>';

    #definir les variables de session
    $_SESSION['prenom']='Pierre';
    $_SESSION['age']=25;

    //recuperer les valeurs de session
    echo 'Ton prénom est : '.$_SESSION['prenom'].'<br>';
    echo 'Ton âge est : '.$_SESSION['age'];

    //suppeime les variables de session
    session_unset();
    //detruir la session
    session_destroy();





?>




</body>

</html>