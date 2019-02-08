<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';

$twig->addFunction($MoneyRus);
$twig->addFunction($TimeToMidnight);
$twig->addFunction($CountHistory);
$twig->addFunction($HistoryCookie);

echo $twig->render('add_lottempl.html', ['add_base' => $add_base]);
