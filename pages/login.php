<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';

$twig->addFunction($MoneyRus);
$twig->addFunction($TimeToMidnight);
$twig->addFunction($CountHistory);

echo $twig->render('add_login.html', ['add_base' => $add_base]);
