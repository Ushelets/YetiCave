<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();
$key = $_GET['key'];
setcookie("HistoryView[$key]", $key, time() + 86400);

error_reporting(E_ALL & ~E_WARNING);
$twig->addFunction($MoneyRus);
$twig->addFunction($TimeToMidnight);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';
headerPage($add_base[10], $titles[4]['titles']);

foreach ($add_base[10] as $value) {
    if (password_verify($_SESSION['password'], $value['password']) && $_SESSION['login_email'] == $value['email']) {
        echo $twig->render('add_lottempl.html', ['add_base' => $add_base]);
        break;
    } else {
        echo $twig->render('add_lottempl_nologin.html', ['add_base' => $add_base]);
        break;
    }
};

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';