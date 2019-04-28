<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

$twig->addFunction($MoneyRus);
$twig->addFunction($CurrentPrice);
$twig->addFunction($DateNow);
$twig->addFunction($DateFormat);
$twig->addFunction($RestTime);
$twig->addFunction($ArrChunkId);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';
headerPage($value_lgn, $titles[9]['titles']);

if ($_SESSION['password'] != null && $_SESSION['login_email'] != null && $value_lgn !== null) {
    echo $twig->render('add_history.html', ['add_base' => $add_base]);
} else {
    echo $twig->render('add_history_nolog.html', ['add_base' => $add_base]);
}


include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';