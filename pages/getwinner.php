<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';

session_start();

if ($_SESSION['login_email'] == null && $_SESSION['password'] == null) {
    $_SESSION['login_email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
}

$twig->addFunction($PasswordVerify);
$twig->addFunction($DateNow);
$twig->addFunction($DateFormat);
$twig->addFunction($RestTime);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';
headerPage($value_lgn, $titles[10]['titles']);

if ($_SESSION['password'] != null && $_SESSION['login_email'] != null && $value_lgn !== null) {
    echo $twig->render('add_gwinner.html', ['add_base' => $add_base]);
} else {
    echo $twig->render('add_gwinner_nologin.html', ['add_base' => $add_base]);
};

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';