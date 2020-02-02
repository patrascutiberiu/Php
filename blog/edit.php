<?php


$pdo = new PDO('sqlite:data.db',null,null,[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
$error = null;
$success = null;
//$id=$pdo->quote($_GET['id']);
try {
    //$query=$pdo->query('SELECT * FROM posts WHERE id= '.$id);
    //$posts = $query->fetchAll(PDO::FETCH_OBJ);
    //$posts = $query->fetchAll(PDO::FETCH_OBJ);

    if (isset($_POST['titre'], $_POST['content'])) {
        $query= $pdo->prepare('UPDATE posts SET titre = :titre, content = :content WHERE id = :id ');
        $query->execute([
            'titre' => $_POST['titre'],
            'content' => $_POST['content'],
            'id' => $_GET['id']
        ]);
        $success='Votre article a été modifié';
    }
    
    $query=$pdo->query('SELECT * FROM posts WHERE id= :id');
    $query->execute(['id' => $_GET['id']]);
    $post = $query->fetch();

} catch (PDOException $e) {
    $error= $e->getMessage();
}
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <p>
            <a href="/blog">Revenir au listing</a>
        </p>
        <?php if($success): ?>
            <div class="alert alert-success">
                <?=$success?>
            </div>
        <?php endif ?>
        <?php if($error): ?>
            <div class="alert alert-danger"><?=$error?></div>
        <?php else:?>

            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="titre" class="form-control" value="<?= htmlentities($post->titre)?>">
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control"><?= htmlentities($post->content)?></textarea>
                </div>
                <button class="btn btn-primary">Sauvegarder</button>
            </form>
        <?php endif ?>
    </div>
<?php
    /*require 'elements/footer.php';*/
?>

</body>
</html>