<?php
$aDeviner=100;
$erreur=null;
$succes=null;
$value=null;
if (isset($_POST['chiffre'])) {
    $value=(int)$_POST['chiffre'];
    if ($value > $aDeviner){
        $erreur="Votre chiffre est trop grande";
    }    
    elseif ($value < $aDeviner){
        $erreur="Votre chiffre est trop petit";
    }
    else{
        $succes="Bravo ! Vous avez deviné le chiffre <strong>$aDeviner</strong>";
    }    
}
?>


<?php if ($erreur) :?>
<div class="alert alert-danger">
    <?=$erreur?>
</div>
<?php elseif($succes):?>
<div class="alert alert-succes">
    <?=$succes?>
</div>
<?php endif?>



<?php

require_once 'functions.php';

$parfums= [
    'Fraise' =>4,
    'Chocolat' =>5,
    'Vanille' =>3
];
$cornets = [
    'Pot' => 2,
    'Cornet'=>3
];
$supplements = [
    'Pepites' => 1,
    'Nutela' => 2
];

$title = "Composer votre glace";
$ingredients=[];
$total=0;

foreach (['parfum', 'supplement'] as $name) {
    if(isset($_GET[$name])){
        $liste=$name .'s';
    foreach ($_GET[$name] as $value) {
        if(isset($$liste[$value])){
            $ingredients[]=$value;
            $total +=$parfums[$value];
        }
    }
}
}

if(isset($_GET[''])){
    $cornet=$_GET['cornet'];
    if(isset($cornets[$cornet])){
        $ingredients[]=$cornet;
        $total +=$cornets[$cornet];
    }
}
?>
<h1>Composer votre glace</h1>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h2>Votre glace</h2>
                <ul>
                    <?php foreach ($ingredients as $ingredient) :?>
                    <li><?= $ingredient ?></li>
                    <?php endforeach;?>
                </ul>
                <p>
                    <strong>Prix : </strong><?= $total ?> €
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <form action="jeu.php" method="GET">
            <!-- <input type="number" name="chiffre" placeholder="entre 0 et 1000" > 
    <input type="text" name="demo" id="" value="test"> -->
            <!-- <div class="form-group">
        <input type="checkbox" name="parfum[]" value="Fraise" >Fraise<br>
        <input type="checkbox" name="parfum[]" value="Vanille" >Vanille<br>
        <input type="checkbox" name="parfum[]" value="Chocolat" >Chocolat<br>
    </div>
    <input type="text" name="demo[]" id="">
    <input type="text" name="demo[]" id="">
    <button type="submit">Deviner</button> -->
            <h2>Choisissez vos parfums</h2>
            <?php foreach ($parfums as $parfum => $prix) : ?>
            <div class="checkbox">
                <label>
                    <?= checkbox('Parfum', $parfum, $_GET) ?>
                    <?= $parfum?> - <?= $prix ?> €
                </label>
            </div>
            <?php endforeach ;?>

            <h2>Choisissez votre cornet</h2>
            <?php foreach ($cornets as $cornet => $prix) : ?>
            <div class="checkbox">
                <label>
                    <?= radio('Cornets', $cornet, $_GET) ?>
                    <?= $cornet?> - <?= $prix ?> €
                </label>
            </div>
            <?php endforeach ;?>

            <h2>Choisissez vos supplements</h2>
            <?php foreach ($supplements as $supplement => $prix) : ?>
            <div class="checkbox">
                <label>
                    <?= checkbox('Supplement', $supplement, $_GET) ?>
                    <?= $supplement?> - <?= $prix ?> €
                </label>
            </div>
            <?php endforeach ;?>
            <button type="submit" class="btn-btn-primary">Composer ma glace</button>
        </form>
    </div>
</div>



<h2>$_GET</h2>
<pre>
<?php var_dump($_GET) ?>
</pre>

<h2>$_POST</h2>
<pre>
<?php var_dump($_POST) ?>
</pre>