<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';

echo $twig->render('add_signUp.html', ['add_base' => $add_base]);
