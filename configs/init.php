<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . '/templates');

$twig = new Twig_Environment($loader, [
 'cache' => 'compilation_cache',
 'auto_reload' => true,
]);

date_default_timezone_set('Europe/Moscow');

$MoneyRus = new Twig_SimpleFunction('MoneyRus', function ($money) {
 $data = number_format($money, 0, ',', ' ');
 return $data;
});

$TimeToMidnight = new Twig_SimpleFunction('TimeToMidnight', function () {
 $ts_midnight = strtotime('tomorrow');
 $ts = time();
 $sec_to_midnight = $ts_midnight - $ts;
 $hours = floor($sec_to_midnight / 3600);
 $minutes = floor(($sec_to_midnight % 3600) / 60);
 return $hours . ':' . $minutes;
});

$CountHistory = new Twig_SimpleFunction('CountHistory', function ($history) {
 $data = count($history);
 return $data;
});

$AddImage = new Twig_SimpleFunction('AddImage', function ($image_err, $tmp_name, $uploads_dir, $name) {
 foreach ($image_err as $key => $error) {
  if ($error == UPLOAD_ERR_OK) {      
   move_uploaded_file($tmp_name, "$uploads_dir/$name");
  }
 }

});