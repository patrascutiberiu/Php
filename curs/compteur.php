<?php

function ajouter_vue()
{
    $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'curs_net'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'compteur.txt';
    $fichier_jurnalier= $fichier .'-'.date('Y-m-d');
    incr_compteur($fichier);
    incr_compteur($fichier_jurnalier);
}

function incr_compteur(string $fichier): void{
    $compteur = 1;
    if (file_exists($fichier)) {
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    }
    file_put_contents($fichier, $compteur);

}
function nombre_vues() :string
{
    $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'curs_net'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'compteur.txt';
    return file_get_contents($fichier);
}