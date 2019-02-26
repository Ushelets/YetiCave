<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

$twig->addFunction($MoneyRus);
$twig->addFunction($TimeToMidnight);
$twig->addFunction($CountHistory);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';
headerPage($add_base[10], $add_base[6][3]);

echo $twig->render('add_login.html', ['add_base' => $add_base]);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';
