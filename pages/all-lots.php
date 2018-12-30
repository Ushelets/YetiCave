<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/data.php';

$twig->addFunction($MoneyRus);
$twig->addFunction($TimeToMidnight);

echo $twig->render('add_alllots.html', ['add_base' => $add_base]);