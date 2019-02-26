<?php

function headerPage($users, $title)
{
 foreach ($users as $value) {
  if (password_verify($_SESSION['password'], $value['password']) && $_SESSION['login_email'] == $value['email']) {
   echo '
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>' . $title . '</title>
<link href="/css/normalize.min.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">
</head>

<body>

  <header class="main-header">
    <div class="main-header__container container">
      <h1 class="visually-hidden">YetiCave</h1>
      <a class="main-header__logo" href="../index.php">
        <img src="/img/logo.svg" width="160" height="39" alt="Логотип компании YetiCave">
      </a>
      <form class="main-header__search" method="get" action="">
        <input type="search" name="search" placeholder="Поиск лота">
        <input class="main-header__search-btn" type="submit" name="find" value="Найти">
      </form>
      <a class="main-header__add-lot button" href="../pages/add-lot.php">Добавить лот</a>
      <div class="user-menu_image"> <img src="/img/user.jpg" width="80" height="80" alt="Пользователь">
        <p>' . $value['name'] . '</p>
    <a class="text-link" href="../pages/session_close.php">Завершить
    сеанс</a>
      </div>
</header>
          ';
   break;
  } else {
   echo '
  <!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>' . $title . '</title>
<link href="/css/normalize.min.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">
</head>

<body>

  <header class="main-header">
    <div class="main-header__container container">
      <h1 class="visually-hidden">YetiCave</h1>
      <a class="main-header__logo" href="../index.php">
        <img src="/img/logo.svg" width="160" height="39" alt="Логотип компании YetiCave">
      </a>
      <form class="main-header__search" method="get" action="">
        <input type="search" name="search" placeholder="Поиск лота">
        <input class="main-header__search-btn" type="submit" name="find" value="Найти">
      </form>
      </div>
</header>
          ';
   break;
  }
 }

}