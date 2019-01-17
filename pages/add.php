<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/data.php';

$twig->addFunction($MoneyRus);
$twig->addFunction($TimeToMidnight);
$twig->addFunction($AddImage);
$twig->addFunction($ImageName);
$twig->addFunction($DateFormat);

echo $twig->render('add_add.html', ['add_base' => $add_base]);
