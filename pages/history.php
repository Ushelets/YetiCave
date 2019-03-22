<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

$twig->addFunction($MoneyRus);
$twig->addFunction($TimeToMidnight);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php';
headerPage($add_base[10], $titles[9]['titles']);

foreach ($add_base[10] as $value) {
 if (password_verify($_SESSION['password'], $value['password']) && $_SESSION['login_email'] == $value['email']) {
  echo $twig->render('add_history.html', ['add_base' => $add_base]);
  break;
 } else {
  echo $twig->render('add_history_nolog.html', ['add_base' => $add_base]);
  break;
 }
}

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';