<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/templates/include/header_all.php';

foreach ($add_base[4] as $key => $value) {
    if ($value['id'] == $_SESSION['keyG']) {
        $id_category = $value['id'];
    };
}

$sql_insrt_hst = 'INSERT INTO history (history_id, history_name, history_email, history_price, id_category) VALUES (?, ?, ?, ?, ?)';

$stmt = db_get_prepare_stmt($link, $sql_insrt_hst, [$value_lgn['id'], $value_lgn['name'], $value_lgn['email'], $_POST['cost'], $id_category]);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    echo "
    <html>
      <head>
       <meta http-equiv='Refresh' content='0; URL=http://htmlacademy/pages/lot.php?key= $id_category'>
      </head>
    </html>";
} else {
    printf("Сообщение ошибки: %s\n", mysqli_error($link));
};