<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';

foreach ($add_base[4] as $key => $value) {
    if ($key == $_SESSION['keyG']) {
        $id_category = $value['id'];
        $rtn = $key;
    };
}

$sql_insrt_hst = 'INSERT INTO history (history_name, history_price, id_category) VALUES (?, ?, ?)';

$stmt = db_get_prepare_stmt($link, $sql_insrt_hst, [$value_lgn['name'], $_POST['cost'], $id_category]);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    echo "
    <html>
      <head>
       <meta http-equiv='Refresh' content='0; URL=http://htmlacademy/pages/lot.php?key=$rtn'>
      </head>
    </html>";
} else {
    printf("Сообщение ошибки: %s\n", mysqli_error($link));
};