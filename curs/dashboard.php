<?php
require_once('compteur.php');
$total = nombre_vues();
$annee= (int)date('Y');
$annee_selection = (int)$_GET['annee'];
?>
<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?php for($i=0; $i<5; $i++):?>
            <a class="liste-group-item <?= $annee-$i === $annee_selection ? 'active':''?>" href="dashboard.php?annee=<?= $annee-$i?>"><?= $annee-$i?></a>
            <?php endfor ?>
</div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <strong style="font-size:3em"><?= $total?></strong>
                Visite<?= $total >1? 's':''?> total
            </div>
        </div>
    </div>
</div>