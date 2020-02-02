<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php

        function nbX(){
            $x=rand(1,50);
            echo $x;
        }
        nbX();
       
        echo '<br>';

        nbX();

        echo '<br>';

        function bonjour($prenom,$age){
            echo 'Bonjour '.$prenom.
            '. As-tu '.$age.' age?<br>';
        }
        bonjour('Grase',24);

        function multi1($a,$b){
            echo $a.' * '.$b.' = ' .$a * $b;
        }

        multi1(10,2);

        function multi2($x,$y){
            $z=$x * $y;
            return $z;
        }

        echo '<br>';

        multi2(3,5);

        echo '3 * 6 = '.multi2(3,6);

        echo '<br>';

        $x=20;

        function test(){
            global $x;
            $x*=2;
        }
        
        test();
        echo $x;

        echo '<br>';

        function compte1(){
            static $x=5;
            echo $x.'<br>';
            $x++;
        }
        compte1();
        compte1();

        function compte2(){
            $x=5;
            echo $x.'<br>';
            $x++;
        }
        compte2();
        compte2();

        echo '<br>';

        //constante (define)
        define('Bonjour',25);
        echo Bonjour;

        echo '<br>';

        function affiche(){
            echo Bonjour;
        }
        affiche();

        echo '<br>';
        
        echo __LINE__.'<br>';
        echo __FILE__.'<br>';
        echo __DIR__.'<br>';
        echo __LINE__.'<br>';
        
        function test2(){
            echo __FUNCTION__;
        }

        test2();

        echo '<br>';

        $prenoms=array('tib','vali','grasu','alexino');

        $tailleP=count($prenoms);
        echo $tailleP.'<br>';

        echo $prenoms[2];

        for ($i=0; $i < $tailleP; $i++) { 
            echo $prenoms[$i].'<br>';
        }

        echo '<br>';

        foreach ($prenoms as $value) {
            echo $value.'<br>';
        }

        echo '<br>';

        foreach ($prenoms as $value) {
            echo $value.'<br>';
        }

        echo '<br>';

        #tableau associatif
        $age=array('Pierre'=>25,'Paul'=>20,'Jean'=>32);

        $sport['Pierre']='Trail';
        $sport['Paul']='natation';

        echo $age['Pierre'].'<br>';
        echo $sport['Pierre'];
        
        echo '<br><br>';

        foreach ($age as $index => $value) {
            echo $index .' a '.$value.' ans<br>';
        }

        echo '<br><br>';

        //tableau multidimensionnels
        $inscrits=array(
            array('Pierre',25,'pierre@gmail.com'),
            array('Paul',20,'paul@gmail.com'),
            array('J&M',22,'j&m@gmail.com')
        );

        for ($ligne=0; $ligne < 3; $ligne++) {
            $nLign=$ligne+1;
            echo '<ul>n° : '.$nLign.'</ul>';
            
            for ($cologne=0; $cologne < 3; $cologne++) { 
                echo'<li>'.$inscrits[$ligne][$cologne].'</li>';
            }
        }

        echo '<br><br>';

        $tab=array('Pierre',25,'pierre@gmail.com');

        $tailleTab=count($tab);

        for ($i=0; $i < $tailleTab ; $i++) { 
            echo $tab[$i].' ';
        }

        echo $inscrits[0][0];
        echo $inscrits[0][1];
        echo $inscrits[0][2];
        echo $inscrits[1][0];
        echo $inscrits[1][1];
        echo $inscrits[1][2];

        echo '<br><br>';

        print_r($inscrits);      

        echo '<pre>';
        print_r($inscrits);
        echo '</pre>';

        $t=25;

        print($t);

    ?>
</body>

</html>