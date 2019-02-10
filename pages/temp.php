<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';

/* $twig->addFunction($ClrHstrCookie);
$twig->addFunction($ReturnedR0);

echo $twig->render('add_temp.html', ['add_base' => $add_base]);
 */
/* var_dump($_COOKIE['HistoryView']);
echo "<br>","2","<br>";
var_dump($cookieHistory);
 */
unset($_COOKIE['HistoryView']);
unset($add_base[11]);
setcookie('HistoryView', '', time() - 3600, '/');

/* echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=http:../index.php'>
  </head>
</html>"; */

var_dump($add_base[11]);
echo '2', '<br>';
var_dump($_COOKIE['HistoryView']);


