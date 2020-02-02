<?php
session_start();
$title= "Nous contacter";
require_once('config.php');
require_once('functions.php');
date_default_timezone_set('Europe/Paris');
$heure = (int)$_GET['heure'] ?? date('G');
$jour=(int)($_GET['jour'] ?? date('N')-1);
$creneaux= CRENEAUX[$jour];
$ouvert = in_creneaux($heure,$creneaux);
$creneaux=creneaux_html(CRENEAUX);
// $color ='salmon';
// if (!$ouvert) {
//     $color= 'red';
// }
$color= $ouvert ? 'salmon' : 'red'; 
?>

<div class="row">
    <div class="col-md-8">
        <!-- <pre>
            <?php //var_dump($_SESSION);?>
        </pre> -->
        <?php 
            require_once 'compteur.php';
            ajouter_vue();
            $vues=nombre_vues();
        ?>
        Il y a <?= $vues?> visite<?php if ($vues > 1):?>s<?php endif; ?> sur le site
        <h2>Nous contacter</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, mollitia praesentium nobis quidem cumque facere
            perferendis accusamus est eligendi alias earum, eum cum aut fugiat natus adipisci magni ipsam quos!</p>
    </div>
    <div class="col-md-4">
        <h2>Horaire d'ouverture</h2>

        <form action="" method="GET">
            <div class="form-group">
                <?= select('jour',$jour, JOURS)?>
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="heure" value="<?= $heure?>">
            </div>
            <button class="btn btn-primary" type="submit">Voir si le magasin est ouvert</button>
        </form>

        <?php if($ouvert): ?>
            <div class="alert alert-success">
                Le magasin sera ouvert
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                Le magasin sera fermé
            </div>
        <?php endif ?>

        <ul>
            <?php foreach (JOURS as $key => $jour) : ?>
            <li <?php if($key+1===(int)date('N')):?> style="color:<?=$color; ?>";<?php endif ?>>
                
                <?= $jour.' :'?>
                <?= creneaux_html(CRENEAUX[$key]);?>
            </li>
            <?php endforeach; ?>
        </ul>

    </div>
</div>