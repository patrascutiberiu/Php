<?php

require_once 'Loader.php';
require_once 'Debug.php';

$db = Db::getDb();
d($db);

$result = Formulaire::select(1);

d($result);

$result = Formulaire::selectAll();

d($result);