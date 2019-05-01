<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();


if ($_GET['search']) {
    $_SESSION['SrchName'] = $_GET['search'];
    /* setcookie("SrchName", $_GET['search'], time() + 86400);
    if (!headers_sent()) {
        header("Refresh: 0"); */
};

$sql_srch_goods = 'SELECT * FROM goods WHERE MATCH(name, lot_discription) AGAINST(? IN BOOLEAN MODE)';

$stmt = db_get_prepare_stmt($link, $sql_srch_goods, [$_GET['search']]);

if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    $srch = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    mysqli_close($link);
};

if ($srch) {
    $_SESSION['SrchAll'] = $srch;
}

$twig->addFunction($MoneyRus);
$twig->addFunction($PasswordVerify);
$twig->addFunction($CurrentPrice);
$twig->addFunction($DateNow);
$twig->addFunction($DateFormat);
$twig->addFunction($RestTime);
$twig->addFunction($ArrChunkAll);
include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';
headerPage($value_lgn, $titles[0]['titles']);

echo $twig->render('add_search.html', ['add_base' => $add_base, 'srch' => $_SESSION['SrchAll'], 'srch_name' => $_SESSION['SrchName']]);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';