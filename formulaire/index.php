<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $db=mysqli_connect("localhost","root","") or die("Erreur");  
        mysqli_select_db($db,"tuto") or die("la base de donnée est introuvable . ");

        if ($_POST) {
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            if (!empty($pseudo) && !empty($password)) {
                mysqli_query($db,"INSERT INTO tuto (pseudo,password) VALUES($pseudo, $pseudo);") or die('Erreur : '.mysqli_error($db));               
                echo "Vous êtes bien enrégistré ! ";
            } else {
                echo "Erreur, un ou plusieurs champs est vide.";
            }   
        }
    ?>
    <form action="" method="POST">
        Pseudo : <input type="text" name="pseudo" required><br>
        Mot de passe : <input type="password" name="password" required>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>