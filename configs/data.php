<?php

$global_var = [
    'keyG' => $_GET['key'],
    'cookieHistory' => $_COOKIE['HistoryView'],
    'curP' => $_GET['page'],
    'arrCh' => $_GET['chnk'],
    'ctg' => $_SESSION['ctg'],
];

$add_usr = [
    '0' => $_POST['email'],
    '1' => $_POST['name'],
    '2' => $_POST['password'],
];

$add_lot = [
    '0' => $_POST['lot-name'],
    '1' => $_POST['category'],
    '2' => $_POST['message'],
    '3' => $_POST['image'],
    '4' => $_POST['lot-rate'],
    '5' => $_POST['lot-step'],
    '6' => $_POST['lot-date'],
];

$uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/img/';
$image_err = $_FILES['image']['error'];
$tmp_name = $_FILES['image']['tmp_name'];
$name = $_FILES['image']['name'];
$upload_err_ok = UPLOAD_ERR_OK;

$add_image = [
    '0' => $uploads_dir,
    '1' => $image_err,
    '2' => $tmp_name,
    '3' => $name,
    '4' => $upload_err_ok,
];

$link = mysqli_connect('localhost', 'root', '', 'yeticave');

$sql_categories = 'SELECT * FROM categories';
$sql_goods = 'SELECT * FROM goods ORDER BY lot_timer DESC';
$sql_history = 'SELECT * FROM history ORDER BY id_category, history_time DESC';
$sql_titles = 'SELECT * FROM titles';
$sql_users = 'SELECT * FROM users';
$sql_history_count = 'SELECT id_category,  COUNT(*) AS id_categ_count FROM history
GROUP BY id_category';
$sql_goods_count = 'SELECT category,  COUNT(*) AS ctg_cnt FROM goods
GROUP BY category';

$categories = mysqli_fetch_all(mysqli_query($link, $sql_categories), MYSQLI_ASSOC);

$goods = mysqli_fetch_all(mysqli_query($link, $sql_goods), MYSQLI_ASSOC);

$history = mysqli_fetch_all(mysqli_query($link, $sql_history), MYSQLI_ASSOC);

$history_count  = mysqli_fetch_all(mysqli_query($link, $sql_history_count), MYSQLI_ASSOC);

$titles = mysqli_fetch_all(mysqli_query($link, $sql_titles), MYSQLI_ASSOC);

$users = mysqli_fetch_all(mysqli_query($link, $sql_users), MYSQLI_ASSOC);

$items_count = mysqli_fetch_all(mysqli_query($link, $sql_goods_count), MYSQLI_ASSOC);

$add_base = [
    '0' => $items_count,
    '1' => $add_usr,
    '2' => $history_count,
    '3' => $categories,
    '4' => $goods,
    '5' => $history,
    '6' => $titles,
    '7' => $global_var,
    '8' => $add_lot,
    '9' => $add_image,
    '10' => $users,
];
