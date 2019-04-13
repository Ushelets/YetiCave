<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

$twig->addFunction($MoneyRus);
$twig->addFunction($CurrentPrice);
$twig->addFunction($DateNow);
$twig->addFunction($RestTime);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';
headerPage($add_base[10], $titles[2]['titles']);

echo $twig->render('add_alllots.html', ['add_base' => $add_base]);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';