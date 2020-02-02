<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenue</h1>
    <?php
        include('classes/humain.class.php');
        include('classes/roumain.class.php');
        $a=new Humain('Tib');
        $b=new Roumain('Vali');

        //fara constructor
        //$a->setNom('Tib');
        //$b->setNom('Vali');
        $b->setPostal(68200);

        echo 'Mon nom est : '.$a->getNom().' <br>Je gagne :'.$a->getSalaire(200).' € / mois <br>';
        echo 'Mon nom est : '.$b->getNom().' - '.$b->getPostal().'<br> Je gagne :'.$b->getSalaire(150).' € / mois<br>';

        
        // echo
        //     'Mon nom est : '.$a->getNom().'<br>',
        //     'Créé le :'.$a->getDateInscrit().'<br>',
        //     'Mon nom est : '.$b->getNom().' - '.$b->getPostal().' créé le '.$b->getDateInscrit().'<br>'     
        //     ;

        //reference a l'humaine
        $classeHumain='Humain';
        echo 'nb obj créés : '.$classeHumain::totalObjCrees().'<br>';
        echo 'nb obj créés : '.$a->totalObjCrees().'<br>';
        echo 'nb obj créés : '.$a::totalObjCrees().'<br>';
        echo 'nb obj créés : '.Humain::totalObjCrees().'<br>';

        $a->setAdresse('4 rue bicheret','95100','Argenteuil');

        echo'adresse complete : <br>' .$a->getAdresse();
        
    ?>


</body>
</html>