<?php

require_once '../Debug.php';
require_once '../Loader.php';

$var = 'Models\\Categories';

$classe = new $var();

// new $var  est egal à 
new Models\Categories();

$var = 'test';

$var2 = $$var; //$$ cest comme on declare une nouvelle variable
//$nouvellevariable$ancienvariable

