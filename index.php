<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

$_SESSION['chnk'] = $_GET['chnk'];

if ($_SESSION['login_email'] == null && $_SESSION['password'] == null) {
    $_SESSION['login_email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
}

$twig->addFunction($MoneyRus);
$twig->addFunction($PasswordVerify);
$twig->addFunction($CurrentPrice);
$twig->addFunction($CurrentAuctionTime);
$twig->addFunction($DateNow);
$twig->addFunction($DateFormat);
$twig->addFunction($RestTime);
$twig->addFunction($ArrChunkAll);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';
headerPage($value_lgn, $titles[0]['titles']);

echo $twig->render('add_base.html', ['add_base' => $add_base]);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';