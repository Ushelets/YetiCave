<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

if ($_SESSION['login_email'] == null && $_SESSION['password'] == null) {
    $_SESSION['login_email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
}

/* echo '<pre>';
var_dump($_FILES);
echo '<pre>'; */
/* echo '<pre>';
var_dump($users);
echo '<pre>'; */

$twig->addFunction($MoneyRus);
$twig->addFunction($TimeToMidnight);
$twig->addFunction($PasswordVerify);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';
headerPage($users, $titles[0]['titles']);

foreach ($users as $value) {
    if (password_verify($_SESSION['password'], $value['password']) && $_SESSION['login_email'] == $value['email']) {
        echo $twig->render('add_base.html', ['add_base' => $add_base]);
        break;
    } else {
        echo $twig->render('add_base_nologin.html', ['add_base' => $add_base]);
        break;
    }
}

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';