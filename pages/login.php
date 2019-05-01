<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';
headerPage($add_base[10], $titles[3]['titles']);

if ($_SESSION['login_email'] != null && $_SESSION['password'] != null) {
    echo "
    <html>
      <head>
       <meta http-equiv='Refresh' content='0; URL=http://htmlacademy/index.php'>
      </head>
    </html>";
} else {

    echo $twig->render('add_login.html', ['add_base' => $add_base]);

    include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';
}