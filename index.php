<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';

$twig->addFunction($MoneyRus);
$twig->addFunction($TimeToMidnight);

echo $twig->render('add_base.html', ['add_base' => $add_base]);