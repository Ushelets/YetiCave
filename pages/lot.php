<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

error_reporting(E_ALL & ~E_WARNING);

$twig->addFunction($MoneyRus);
$twig->addFunction($TimeToMidnight);
$twig->addFunction($CountHistory);
$twig->addFunction($HistoryCookie);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';
headerPage($add_base[10], $add_base[6][4]);

foreach ($users as $value) {
 if (password_verify($_SESSION['password'], $value['password']) && $_SESSION['login_email'] == $value['email']) {
  echo $twig->render('add_lottempl.html', ['add_base' => $add_base]);
  break;
 } else {
  echo $twig->render('add_lottempl_nologin.html', ['add_base' => $add_base]);
  break;
 }
}
;

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';