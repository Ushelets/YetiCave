<?php

$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$titles = [
'0'=> 'Главная',
'1'=> 'Добавление лота',
'2'=> 'Все лоты',
'3'=> 'Вход',
'4'=> 'Лот',
'5'=> 'Мои ставки',
'6'=> 'Результаты поиска',
'7'=> 'Регистрация'
];

$categories = [
 ['promo__item--boards','Доски и лыжи'], 
 ['promo__item--attachment','Крепления'], 
 ['promo__item--boots','Ботинки'], 
 ['promo__item--clothing','Одежда'], 
 ['promo__item--tools','Инструменты'], 
 ['promo__item--other','Разное']
];

$sales_rossignol_snowbord = [];
$sales_DC_Ply_Mens = [   
  [
   'history_name' => 'Иван',
   'history_price' => '10999',
   'history_time' => '5 минут назад',
  ],
  [
   'history_name' => 'Константин',
   'history_price' => '10999',
   'history_time' => '20 минут назад',
  ],
  [
   'history_name' => 'Евгений',
   'history_price' => '10999',
   'history_time' => 'Час назад',
  ],
  [
   'history_name' => 'Игорь',
   'history_price' => '10999',
   'history_time' => '19.03.17 в 08:21',
  ],
  [
   'history_name' => 'Енакентий',
   'history_price' => '10999',
   'history_time' => '19.03.17 в 13:20',
  ],
  [
   'history_name' => 'Семён',
   'history_price' => '10999',
   'history_time' => '19.03.17 в 12:20',
  ],
  [
   'history_name' => 'Илья',
   'history_price' => '10999',
   'history_time' => '19.03.17 в 10:20',
  ],
  [
   'history_name' => 'Енакентий',
   'history_price' => '10999',
   'history_time' => '19.03.17 в 13:20',
  ],
  [
   'history_name' => 'Семён',
   'history_price' => '10999',
   'history_time' => '19.03.17 в 12:20',
  ],
  [
   'history_name' => 'Илья',
   'history_price' => '10999',
   'history_time' => '19.03.17 в 10:20',
  ],
];
$sales_union_contact = [];
$sales_boots_DC_Mutini = [];
$sales_jacket_DC_Mutini = [];
$sales_mask_Oakley_Canopy = [];

$history = [
    $sales_rossignol_snowbord, 
    $sales_DC_Ply_Mens, 
    $sales_union_contact,
    $sales_boots_DC_Mutini, 
    $sales_jacket_DC_Mutini,
    $sales_mask_Oakley_Canopy
 ];


$goods = [
 [
  'name' => '2014 Rossignol District Snowboard',
  'category' => $categories[0][1],
  'lot_discription' => '',
  'lot_amount' => 'Стартовая цена',  
  'price' => '10999',
  'min_cost' =>'0',
  'lot_timer' => '16:54:12',
  'lot_timer_finish' => '',
  'image' => '/img/lot-1.jpg',
  'history' => $history[0],
 ],
 [
  'name' => 'DC Ply Mens 2016/2017 Snowboard',
  'category' => $categories[0][1],
  'lot_discription' => 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот
            снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер
            позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто
            посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  'lot_amount' => '12 ставок',
  'price' => '10999',
  'min_cost' =>'12000',
  'lot_timer' => '',
  'lot_timer_finish' => '00:54:12',
  'image' => '/img/lot-2.jpg',
  'history' => $history[1],
 ],
 [
  'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
  'category' => $categories[1][1],
  'lot_discription' => '',
  'lot_amount' => '7 ставок',
  'price' => '8000',
  'min_cost' =>'0',
  'lot_timer' => '10:54:12',
  'lot_timer_finish' => '',
  'image' => '/img/lot-3.jpg',
  'history' => $history[2],
 ],
 [
  'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
  'category' => $categories[2][1],
  'lot_discription' => '',
  'lot_amount' => '12 ставок',
  'price' => '10999',
  'min_cost' =>'0',
  'lot_timer' => '',
  'lot_timer_finish' => '00:12:03',
  'image' => '/img/lot-4.jpg',
  'history' => $history[3],
 ],
 [
  'name' => 'Куртка для сноуборда DC Mutiny Charocal',
  'category' => $categories[3][1],
  'lot_discription' => '',
  'lot_amount' => '12 ставок',
  'price' => '10999',
  'min_cost' =>'0',
  'lot_timer' => '00:12:03',
  'lot_timer_finish' => '',
  'image' => '/img/lot-5.jpg',
  'history' => $history[4],
 ],
 [
  'name' => 'Маска Oakley Canopy',
  'category' => $categories[5][1],
  'lot_discription' => '',
  'lot_amount' => 'Стартовая цена',
  'price' => '5500',
  'min_cost' =>'0',
  'lot_timer' => '07:13:34',
  'lot_timer_finish' => '',
  'image' => '/img/lot-6.jpg',
  'history' => $history[5],
 ],
];


$add_base = 
[
'0'=> $is_auth, 
'1'=> $user_name, 
'2'=> $user_avatar, 
'3'=> $categories, 
'4'=> $goods, 
'5'=> $history, 
'6'=> $titles
];