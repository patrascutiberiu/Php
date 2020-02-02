<?php
$title="Notre menu";
$menu= file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'menu.tsv');
$lignes = explode(PHP_EOL,$menu);
?>
<h1>Menu</h1>
<?= dump($lignes); ?>