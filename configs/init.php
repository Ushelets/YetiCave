<?php
use Twig\TwigFunction;

require $_SERVER['DOCUMENT_ROOT'] . '/configs/data.php';
require $_SERVER['DOCUMENT_ROOT'] . '/configs/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

error_reporting(E_ERROR | E_PARSE);

$loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . '/templates');

$twig = new Twig_Environment($loader, [
    'cache' => 'compilation_cache',
    'auto_reload' => true,
    'debug' => true,
]);

$twig->addExtension(new Twig_Extension_Debug());

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

$AddImage = new Twig_SimpleFunction('AddImage', function ($image_err, $tmp_name, $uploads_dir, $name) {
    foreach ($image_err as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name_key = $tmp_name[$key];
            $name_key = basename($name[$key]);
            move_uploaded_file($tmp_name_key, "$uploads_dir/$name_key");
        }
    }
});

$ImageName = new Twig_SimpleFunction('ImageName', function ($image_err, $name) {
    foreach ($image_err as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $name_key = basename($name[$key]);

            return $name_key;
        }
    }
});

$DateFormat = new Twig_SimpleFunction('DateFormat', function ($date) {
    $date_frt = new DateTime($date);

    return $date_frt->format('d.m.Y H:i:s');
});

$DateNow = new Twig_SimpleFunction('DateNow', function () {
    return date('d.m.Y H:i:s');
});

$PasswordVerify = new Twig_SimpleFunction('PasswordVerify', function ($session_pass, $saved_pass) {
    return password_verify($session_pass, $saved_pass);
});

$CurrentPrice = new Twig_SimpleFunction('CurrentPrice', function ($history, $key) {
    foreach ($history as $value) {
        if ($value['id_category'] == $key) {
            $hist_price[] = $value['history_price'];
        }
    }
    return max($hist_price);
});
$CurrentAuctionTime = new Twig_SimpleFunction('CurrentAuctionTime', function ($history, $key) {
    foreach ($history as $value) {
        if ($value['id_category'] == $key) {
            $hist_time[] = $value['history_time'];
        }
    }
    $h_time = max($hist_time);
    return $h_time;
});

$RestTime = new Twig_SimpleFunction('RestTime', function ($h_time, $time_fin) {
    $h_time_f = new DateTime($h_time);
    $good_time_f = new DateTime($time_fin);

    $diff = date_diff($h_time_f, $good_time_f);
    return $diff->format('%aдн. %Hч %Iмин %Sс');
});

$ArrChunk = new Twig_SimpleFunction('ArrChunk', function ($goods, $ctg, $page_itm) {
    foreach ($goods as $value) {
        if ($value['category'] === $ctg) {
            $arr_ch[] = $value;
        }
    };
    return array_chunk($arr_ch, $page_itm, true);
});
$ArrChunkId = new Twig_SimpleFunction('ArrChunkId', function ($goods, $id, $page_itm) {
    foreach ($id as $val) {
        foreach ($goods as $value) {
            if ($value['id'] === $val) {
                $arr_ch[] = $value;
            }
        };
    };
    return array_chunk($arr_ch, $page_itm, true);
});

$ArrChunkAll = new Twig_SimpleFunction('ArrChunkAll', function ($goods, $page_itm) {
    foreach ($goods as $value) {
        $arr_ch[] = $value;
    };
    return array_chunk($arr_ch, $page_itm, true);
});