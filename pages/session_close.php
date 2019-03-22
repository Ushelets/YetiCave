<?php
require $_SERVER['DOCUMENT_ROOT'] . '/configs/data.php';
session_start();

$_SESSION = [];
unset($login, $_SESSION);

echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=http://htmlacademy/index.php'>
  </head>
</html>";