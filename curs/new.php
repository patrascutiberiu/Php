<?php 
$erreur=null;
$success=null;
$email=null;

if (!empty($_POST['email'])) {
    $email=$_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $file =__DIR__. DIRECTORY_SEPARATOR. 'emails'. DIRECTORY_SEPARATOR. date('y-m-d') . ".txt";
        file_put_contents($file, $email  .PHP_EOL, FILE_APPEND);
        $success = "Votre email à bien été enregistré !";
        $email=null;
    }
    else {
        $erreur= "Email invalide";
    }

}
?>

<h1>S'inscrire à la newsletter</h1>

<p>
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus possimus a beatae cum enim ullam, culpa ut tempora suscipit corrupti delectus modi, reiciendis repellat expedita, laboriosam maiores distinctio. Laboriosam, illum.
</p>

<?php if($erreur):?>
    <div class="alert alert-danger">
        <?= $erreur?>
    </div>
<?php endif; ?>

<?php if($success):?>
    <div class="alert alert-succes">
        <?= $success?>
    </div>
<?php endif; ?>

<form class="form-inline" method="POST" action="new.php">
    <div class="form-group">
        <input type="email" name="email" placeholder="Entrer votre email" required class="form-control" value="<?= htmlentities($email)?>">
    </div>
    <button class="btn btn-primary" type="submit">S'inscrire</button>
</form>