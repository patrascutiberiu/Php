<?php

require_once 'Loader.php';
require_once 'Debug.php';

$db = Db::getDb();
d($db);

$db = DbTable::get(2);
d($db);

$db = DbTable::getAll();
d($db);

// $db = DbTable::delete(1);
// d($db);

//$db = DbTable::insert("tata", "azerty","gt@gt.fr");
$db = DbTable::getAll();
d($db);

