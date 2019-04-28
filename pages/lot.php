<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';

session_start();
$key = $_GET['key'];
$_SESSION['keyG'] = $_GET['key'];

setcookie("HistoryView[$key]", $key, time() + 86400);

$twig->addFunction($MoneyRus);
$twig->addFunction($DateFormat);
$twig->addFunction($CurrentPrice);
$twig->addFunction($DateNow);
$twig->addFunction($RestTime);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';

headerPage($value_lgn, $titles[4]['titles']);

if ($_SESSION['password'] != null && $_SESSION['login_email'] != null && $value_lgn !== null) {
    echo $twig->render('add_lottempl.html', ['add_base' => $add_base]);
} else {
    echo $twig->render('add_lottempl_nologin.html', ['add_base' => $add_base]);
};

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';