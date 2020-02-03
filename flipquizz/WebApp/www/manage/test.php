<?php
//required stoped de script
//include continue le script
require_once '../../Debug.php';
require_once '../../Loader.php';

$username = 'Tib';

$test = new Models\AccountManager;

//$tib=$test->getUser($username);

//d($tib);

// echo (__DIR__);
// echo ('<hr>');
// //on remonte dun repertoir plus si on ajute un 2 argument pour sortir plus haut de fichier
// echo dirname(__DIR__);

// $test->addUser('plm','azerty','plm@fr.fr');

// d($test);

//$inexistent = $test->getUser(1234);

//d($inexistent);

$test->addUser('euuur','azerty','eu@fr.fr');

//d($test);
$test->addUser('vali','poiuy','tre@yh.fr');

//d($test);

