<?php
/*require 'elements/header.php';*/

$pdo = new PDO('sqlite:data.db',null,null,[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
$error = null;
$success=null;

try {
    if (isset($_POST['titre'], $_POST['content'])) {
        $query= $pdo->prepare('INSERT INTO posts (titre,content, created_at) VALUES(:titre, :content, :created_at)');
        $query->execute([
            'titre' => $_POST['titre'],
            'content' => $_POST['content'],
            'created_at' => time()
        ]);
        header('Location: /blog/edit.php?id='. $pdo->lastInsertId());
    }
    
    // $query=$pdo->query('SELECT * FROM posts');
    // $posts = $query->fetchAll(PDO::FETCH_OBJ);

    $query=$pdo->query('SELECT * FROM posts WHERE id= :id');
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
    <div class="container" >
        <?php if($error): ?>
        <div class="alert alert-danger"><?=$error?></div>
        <?php else:?>

        <form action="" method="post">
            <div class="form-group">
                <label for="">Titre</label>
                <input type="text" name="titre" class="form-control" value="Titre">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" class="form-control" ></textarea>
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