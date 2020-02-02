<?php
// $eleves = [
//     'cm1' =>['tib','val','cata','dami', 'ami'],
//     'cm2' =>['petra','anda']
// ];
// foreach ($eleves as $key => $value) {
//     echo "La classe $key :\n";
//     foreach ($value as $value2) {
//         echo "- $value2";
//     }
//     echo"\n";
// }

// $notes=[];
// $action=null;

// while ($action !== 'fin') {
//     $action= readline('Entre une nouvelle note (ou \'fin\' pour terminer) :');
//     if ($action !== 'fin') {
//         $notes[]=(int)$action;
//     }
// }
// foreach ($notes as $value) {
//     echo "- $value\n";
// }

//  $mot = readline('veuillez entrer un mot : ');
//  $reverse = strrev($mot);
//  if ($mot == $reverse) {
//      echo "palyndrome";
//  } else {
//      echo "non palyndrome";
//  }
 


// $insultes = ['merde','connase','con','putain','pute','bitte'];
// $phrase=readline('Entrez votre phrase de merde :');
// foreach ($insultes as $value) {
//     $replace=substr($value,0,1) .str_repeat('*',strlen($value)-1);
//     $phrase= str_replace($value, $replace, $phrase);
// }
// echo $phrase;

function repondre_oui_non($phrase){
    while (true) {
        $reponse=readline($phrase." - (o)ui / (n)on : ");
        if ($reponse === "o") {
            return true;
        }
        elseif ($reponse === 'n') {
            return false;
        }
    }
}

$resultat= repondre_oui_non('plm ');
var_dump($resultat);