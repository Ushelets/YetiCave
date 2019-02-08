<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/data.php';
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
    $tmp_name_key = $tmp_name[$key];
    $name_key = basename($name[$key]);    
    move_uploaded_file($tmp_name_key, "$uploads_dir/$name_key");    
  }  
 }
});

$ImageName = new Twig_SimpleFunction('ImageName', function ($image_err,$name) {
 foreach ($image_err as $key => $error) {
  if ($error == UPLOAD_ERR_OK) {          
    $name_key = basename($name[$key]);        
    return $name_key;    
  }  
 }
});

$DateFormat = new Twig_SimpleFunction('DateFormat',function($date) {
  $date_frt = new DateTime($date);
  return $date_frt->format('d.m.Y') ;
});

$HistoryCookie = new Twig_SimpleFunction('HistoryCookie',function(){
    $key = $_GET['key'];
    setcookie("HistoryView[$key]", $key);       
});

/* $temp = new Twig_SimpleFunction('temp',function($add_base[11]){

}); */