<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';

$twig->addFunction($MoneyRus);
$twig->addFunction($TimeToMidnight);
$twig->addFunction($ClrHistoryCookie);
$twig->addFunction($VarDamp);

echo $twig->render('add_history.html', ['add_base' => $add_base]);

