<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

$twig->addFunction($MoneyRus);
$twig->addFunction($TimeToMidnight);
$twig->addFunction($CountHistory);

$users = $add_base[10];

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php';

echo $twig->render('add_login.html', ['add_base' => $add_base]);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';
