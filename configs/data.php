<?php

$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$categories = [
 ['promo__item--boards','Доски и лыжи'], 
 ['promo__item--attachment','Крепления'], 
 ['promo__item--boots','Ботинки'], 
 ['promo__item--clothing','Одежда'], 
 ['promo__item--tools','Инструменты'], 
 ['promo__item--other','Разное']
];
$goods = [
 [
  'name' => '2014 Rossignol District Snowboard',
  'category' => $categories[0],
  'lot_discription' => '',
  'lot_amount' => 'Стартовая цена',
  'price' => '10999',
  'lot_timer' => '16:54:12',
  'lot_timer_finish' => '',
  'image' => '/img/lot-1.jpg',
 ],
 [
  'name' => 'DC Ply Mens 2016/2017 Snowboard',
  'category' => $categories[0],
  'lot_discription' => 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот
            снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер
            позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто
            посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
  'lot_amount' => '12 ставок',
  'price' => '15999',
  'lot_timer' => '',
  'lot_timer_finish' => '00:54:12',
  'image' => '/img/lot-2.jpg',
 ],
 [
  'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
  'category' => $categories[1],
  'lot_discription' => '',
  'lot_amount' => '7 ставок',
  'price' => '8000',
  'lot_timer' => '10:54:12',
  'lot_timer_finish' => '',
  'image' => '/img/lot-3.jpg',
 ],
 [
  'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
  'category' => $categories[2],
  'lot_discription' => '',
  'lot_amount' => '12 ставок',
  'price' => '10999',
  'lot_timer' => '',
  'lot_timer_finish' => '00:12:03',
  'image' => '/img/lot-4.jpg',
 ],
 [
  'name' => 'Куртка для сноуборда DC Mutiny Charocal',
  'category' => $categories[3],
  'lot_discription' => '',
  'lot_amount' => '12 ставок',
  'price' => '10999',
  'lot_timer' => '00:12:03',
  'lot_timer_finish' => '',
  'image' => '/img/lot-5.jpg',
 ],
 [
  'name' => 'Маска Oakley Canopy',
  'category' => $categories[5],
  'lot_discription' => '',
  'lot_amount' => 'Стартовая цена',
  'price' => '5500',
  'lot_timer' => '07:13:34',
  'lot_timer_finish' => '',
  'image' => '/img/lot-6.jpg',
 ],
];

$add_base = [$is_auth, $user_name, $user_avatar, $categories, $goods];