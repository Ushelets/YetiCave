<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . '/templates');

$twig = new Twig_Environment($loader, [
 'cache' => 'compilation_cache',
 'auto_reload' => true,
]);

/* $twig->addFunction('MoneyRus', new Twig_Function('MoneyRus'));
function MoneyRus($money)
{
    $fmt = new NumberFormatter('ru_RU', NumberFormatter::DECIMAL);
    $a = $fmt->format($money);
    if (intl_is_failure($fmt->getErrorCode())) {
    report_error("Formatter error");
    }
    return $a;
} */
