<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php

        //obtenir le time actuel 
        echo time();


        echo '<br><br>';

        //obtenir un timestamp à partir d'une date
        $tsp=mktime(15,29,00,07,02,1980);
        echo $tsp;
    
        echo '<br><br>';

        //convertir une date en timestamp
        $tspD=strtotime('2019/07/02');
        echo $tspD;

        echo '<br><br>';

        $date1='2019/02/13';
        $date2='2018/03/22';

        $tsp1=strtotime($date1);
        $tsp2=strtotime($date2);

        if ($tsp1>$tsp2) {
            echo 'La date du : '.$date2.' précède le '.$date1.' !';
        } else {
            echo 'La date du : '.$date1.' précède le '.$date2.' !';
        }
        
        echo '<br><br>';
        echo date('d/m/Y');

        echo '<br><br>';       
        echo date('d.m.Y');

        echo '<br><br>';   
        echo date('l');

        echo '<br><br>';   
        echo date('d.m.Y H:i:s');
    
        $jours=array(
            '',
            'Lundi',
            'Mardi',
            'Mercredi',
            'Jeudi',
            'Vendredi',
            'Samedi',
            'Dimanche'
        );

        $mois=array(
            '',
            'Janvier',
            'Février',
            'Mars',
            'Avril',
            'Mai',
            'Juin',
            'Juillet',
            'Août',
            'Septembre',
            'Octobre',
            'Novembre',
            'Decembre'
        );
        echo '<br><br>'; 
        echo $jours[date('N')].' . '.date('d').' . ' .$mois[date('n')];

        var_dump(checkdate(3,29,2019));

        $fichierR= fopen('exemple.txt','r+');
        
        echo'<pre>';
        echo fread($fichierR,filesize('exemple.txt'));
        echo'</pre>';

        fclose($fichierR);

    ?>

</body>

</html>