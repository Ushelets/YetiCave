<?php
setcookie('HistoryView', '', time() - 3600, '../');
unset($GLOBALS['cookieHistory']);
unset($GLOBALS['add_base']);
unset($_COOKIE['HistoryView']);
setcookie('key', '', time() - 3600, '../');

/* echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=http://createsite/index.php'>
  </head>
</html>"; */

