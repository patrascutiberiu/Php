<?php

require_once 'Loader.php';
require_once 'Debug.php';


$db=Db::getDb();

d($db);
//test ok

$db = EntrepriseManager::get(1);

d($db);
//test ok

$db = EntrepriseManager::getAll();

d($db);
//testok
