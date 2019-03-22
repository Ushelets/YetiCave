<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

$name_key = imgName($image_err, $name);

$sql_insrt_goods = 'INSERT INTO goods(name, category, lot_discription, price, lot_step, lot_timer_finish, image) VALUES (?, ?, ?, ?, ?, ?, CONCAT("/img/",?)) ';

$stmt = db_get_prepare_stmt($link, $sql_insrt_goods, [$_POST['lot-name'], $_POST['category'], $_POST['message'], $_POST['lot-rate'], $_POST['lot-step'], $_POST['lot-date'], $name_key]);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    echo "
    <html>
      <head>
       <meta http-equiv='Refresh' content='0; URL=http://htmlacademy/index.php'>
      </head>
    </html>";
};

$twig->addFunction($MoneyRus);
$twig->addFunction($TimeToMidnight);
$twig->addFunction($AddImage);
$twig->addFunction($ImageName);
$twig->addFunction($DateFormat);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';
headerPage($add_base[10], $titles[1]['titles']);

echo $twig->render('add_add.html', ['add_base' => $add_base]);

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/main_footer_bottom.php';