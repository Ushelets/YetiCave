<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . '/templates');

$twig = new Twig_Environment($loader, [
 'cache' => 'compilation_cache',
 'auto_reload' => true,
]);

$MoneyRus = new Twig_SimpleFunction('MoneyRus', function ($money) {
 $data = number_format($money, 0, ',', ' ');
 return $data;
});