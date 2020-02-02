<?php

require_once ('class/Message.php');
require_once ('class/GuestBook.php');
$errors = null;
$success = false;
$guestbook = new GuestBook(__DIR__ .DIRECTORY_SEPARATOR. 'data' .DIRECTORY_SEPARATOR. 'message.txt');

if (isset($_POST['username'],$_POST['message'])) {
    $message = new Message($_POST['username'], $_POST['message']);
    if ($message->isValid()) {
        $guestbook->addMessage($message);
        $success = true;
        $_POST=[];
    }
    else {
        $errors = $message->getErrors();
    }
}
$messages= $guestbook->getMessages();
$title ='Livre D\'or';
require 'elements/header.php';
?>

<div class="container">
    <h1>Livre D'or</h1>

    <?php if(!empty($errors)):?>
        <div class="alert alert-danger">
            Formulaire invalide
        </div>
    <?php endif ?>

    <?php if(!empty($success)):?>
        <div class="alert alert-success">
            Merci pour votre message ! A bientôt ! 
        </div>
    <?php endif ?>

    <form action="" method="post">
        <div class="form-group">
            <input required value="<?= trim(htmlentities($_POST['username'] ?? ''))?>" type="text" name="username" placeholder="Votre pseudo" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>">
            <?php if(isset($errors['username'])): ?>
                <div class="invalid-feedback"><?=$errors['username']?></div>
            <?php endif ?>
        </div>
        
        <div class="form-group">
            <textarea name="message" placeholder="Votre avis" required class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"><?=trim(htmlentities($_POST['message'] ?? '')); ?></textarea>
            <?php if(isset($errors['message'])): ?>
                <div class="invalid-feedback"><?=$errors['message']?></div>
            <?php endif ?>
        </div>

        <button class="btn btn-primary">Envoyer</button>

    </form>
    
    <?php if(!empty($messages)) :?>
    <h1 class="mt-4">Vos messages</h1>

    <?php foreach($messages as $message) :?>
        <?= $message->toHTML()?>
    <?php endforeach;?>

    <?php endif ?>
</div>
<?php
require 'elements/footer.php';
?>
