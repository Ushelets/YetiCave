<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();
$_SESSION['login_email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];

$name_key = imgName($image_err, $name);
$pswd_hsh = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql_insrt_usr = 'INSERT INTO users (email, name, password, image) VALUES (?, ?, ?, CONCAT("/img/",?))';

$stmt = db_get_prepare_stmt($link, $sql_insrt_usr, [$_POST['email'], $_POST['name'], $pswd_hsh, $name_key]);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    AddImage($image_err, $tmp_name, $uploads_dir, $name);
    echo "
    <html>
      <head>
       <meta http-equiv='Refresh' content='0; URL=http://htmlacademy/pages/login.php'>
      </head>
    </html>";
};