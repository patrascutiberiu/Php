<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
        //avec i on s'en fout de majuscule ou min
        $r='/e/';

        echo $r;

        echo '<br><br>';

        $txt='Bonjour, je m\'appelle Tib';

        preg_match($r,$txt,$pm);
        preg_match_all($r,$txt,$pma);

        echo'<pre>';
        print_r($pm);
        print_r($pma);
        echo'<pre>';

        if (preg_match($r,$txt)) {
            echo 'Il y a '.preg_match_all($r,$txt).' '.$r.' dans : '.$txt;
        }
        else {
            echo'Schéma de recherche non trouvé';
        }
    
        echo '<br><br>';

        $s='/jour/';
        $s1='/azerty/';
        $t='Bonjour, je m\'appelle Tib';

        echo '1 '.preg_filter($s,'soir',$t);
        echo '<br><br>';
        echo '2 '.preg_filter($s1,'u',$t);
        echo '<br><br>';
        echo '3 '.preg_replace($s1,'u',$t);
        echo '<br><br>';
        echo '4 '.$txt;

        echo '<br><br>';

        $tab= array('e','a','t','l','e','e');

        $resultat=preg_grep($r,$tab);

        echo'<pre>';
        print_r($resultat);
        echo'</pre>';

        $resultat2=preg_split($r,$t);

        echo'<pre>';
        print_r($resultat2);
        echo'</pre>';

        echo '<br><br>';

        $r1='/ou?/';
        $r2='/^b/i';
        $r3='/p(?=elle)/';
        $r4='/p{3}/';

        //trimite 1 daca contine minim un e
        var_dump(preg_match($r,$t));

        preg_match_all($r1,$t,$resultat3);

        echo'<pre>';
        print_r($resultat3);
        echo'</pre>';

        //trimite 1 daca fraza incepe cu b
        var_dump(preg_match($r2,$t));

        //trimite 1 daca p e urmat de elle
        var_dump(preg_match($r3,$t));

        //trimite 1 daca contine 3 p unu dupa altu
        var_dump(preg_match($r4,$t));

        $u='/^d/';
        $u2='/^m/m';
        $u3='/^b/i';
    
        if (preg_match($u,$t)) {
            echo 'lettre d au début de chaîne';
        } else {
            echo'caractère non trouvé';
        }
        echo '<br><br>';
        if (preg_match($u2,$t)) {
            echo 'lettre d au début de ligne';
        } else {
            echo'caractère non trouvé';
        }
        echo '<br><br>';
        if (preg_match($u3,$t)) {
            echo 'b ou B au début de chaîne';
        } else {
            echo'caractère non trouvé';
        }
        
    ?>
</body>

</html>