<?php

//ouverture connection a la basse de donne

$objPdo=new PDO('mysql:host=localhost;dbname=agenda','root','');

//preparation de la requête sql

$pdoStatement=$objPdo->prepare('INSERT INTO contact VALUES (NULL, :nom, :prenom, :tel, :mail)');

//on lie chaque marquer à une valeur

if (isset($_POST['lastName'])) {
    $_POST['lastName']= htmlentities($_POST['lastName']);

    if (preg_match("#^[a-zA-Z]{3,20}$#",$_POST['lastName'])) {
        $pdoStatement->bindValue(':nom', $_POST['lastName'], PDO::PARAM_STR);
    } else {
        echo 'Le '.$_POST['lastName'].' n\'est pas un nom VALIDE !';
        exit;
    }
    
}

if (isset($_POST['firstName'])) {
    $_POST['firstName']= htmlentities($_POST['firstName']);

    if (preg_match("#^[a-zA-Z]{3,20}$#",$_POST['firstName'])) {
        $pdoStatement->bindValue(':prenom', $_POST['firstName'], PDO::PARAM_STR);
    } else {
        echo 'Le '.$_POST['firstName'].' n\'est pas un prenom VALIDE !';
        exit;
    }
    
}

if (isset($_POST['phone'])) {

    $_POST['phone'] = htmlentities($_POST['phone']);

    if (preg_match("#^0[1-79]([-. ]?[0-9]{2}){4}$#",$_POST['phone'])) {
        $pdoStatement->bindValue(':tel', $_POST['phone'], PDO::PARAM_STR);
        //echo 'Le '.$_POST['phone'].' est un numéro VALIDE !';    
    } else {
        echo 'Le '.$_POST['phone'].' n\'est pas un numéro VALIDE !';
        exit;
    }      
}

if (isset($_POST['mail'])) {

    $_POST['mail'] = htmlentities($_POST['mail']);

    if (preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$#",$_POST['mail'])) {
        $pdoStatement->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
        //echo 'L\'adresse ' . $_POST['mail'] . ' est VALIDE !';
    } else {
        echo 'L\'adresse ' . $_POST['mail'] . ' n\'est pas VALIDE !';
        exit;
    }
}

//éxecution de la requêtepréparée

$insertIsOk= $pdoStatement->execute();

if ($insertIsOk) {
    $message= 'Le contact a été ajouté !';
}
else 
{
    $message = 'Echec de l\'insertion';
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Insertion des contacts</h1>
<p><?php echo $message;?></p>

</body>
</html>