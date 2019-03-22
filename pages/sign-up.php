<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';
headerPage($add_base[10], $titles[7]['titles']);

echo $twig->render('add_signUp.html', ['add_base' => $add_base]);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';