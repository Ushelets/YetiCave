<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

if ($_GET['ctg'] != NULL) {
    $_SESSION['ctg'] = $_GET['ctg'];
}
$add_base[7]['ctg'] = $_SESSION['ctg'];

$twig->addFunction($MoneyRus);
$twig->addFunction($CurrentPrice);
$twig->addFunction($DateNow);
$twig->addFunction($DateFormat);
$twig->addFunction($RestTime);
$twig->addFunction($ArrChunk);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';
headerPage($value_lgn, $titles[2]['titles']);

echo $twig->render('add_alllots.html', ['add_base' => $add_base]);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';