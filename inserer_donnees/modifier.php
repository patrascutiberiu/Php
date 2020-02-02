<?php

$objPdo= new PDO('mysql:host=localhost;dbname=agenda','root','');

$pdoStatement=$objPdo->prepare('UPDATE contact SET nom=:nom, prenom=:prenom, tel=:tel, mail=:mail WHERE id=:num LIMIT 1');

$pdoStatement->bindValue(':num',$_POST['numContact'], PDO::PARAM_INT);
$pdoStatement->bindValue(':nom',$_POST['lastName'], PDO::PARAM_STR);
$pdoStatement->bindValue(':prenom',$_POST['firstName'], PDO::PARAM_STR);
$pdoStatement->bindValue(':tel',$_POST['phone'], PDO::PARAM_STR);
$pdoStatement->bindValue(':mail',$_POST['mail'], PDO::PARAM_STR);

$execIsOk = $pdoStatement->execute();

if ($execIsOk) {
    $message ='Le contact a été mis à jour';
}
else {
    $message= 'Echec de mise à jour du contact';
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification : resultat</title>
</head>
<body>
    <h1>Résultat de la modification</h1>
    <p><?= $message?></p>
</body>
</html>