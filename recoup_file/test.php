<?php
$fichier=__DIR__.DIRECTORY_SEPARATOR.'demo.txt';
file_put_contents($fichier,'Salut');
echo file_get_contents(($fichier));