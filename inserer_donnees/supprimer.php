<?php

$objPdo= new PDO('mysql:host=localhost;dbname=agenda','root','');

$pdoStatement=$objPdo->prepare('DELETE FROM contact WHERE id=:num LIMIT 1');

$pdoStatement->bindValue(':num',$_GET['numContact'],PDO::PARAM_INT);

//execution de la requête

$execIsOk=$pdoStatement->execute();

if ($execIsOk) {
    $message = 'Le contact a été supprimé';
} else {
    $message = 'Echec de la suppression du contact';
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suppresion</title>
</head>
<body>
    <h1>Suppresion</h1>
    <p><?=$message?></p>
</body>
</html>