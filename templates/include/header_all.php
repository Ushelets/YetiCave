<?php

foreach ($users as $value) {;
    if (password_verify($_SESSION['password'], $value['password']) && $_SESSION['login_email'] == $value['email']) {
        $value_lgn = $value;
    }
};

function headerPage($value_lgn, $title)
{
    if ($_SESSION['password'] != null && $_SESSION['login_email'] != null && $value_lgn !== null) {
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
      <form class="main-header__search" method="get" action="../pages/search.php" enctype="multipart/form-data">
        <input type="search" name="search" placeholder="Поиск лота">
        <input class="main-header__search-btn" type="submit" name="find" value="Найти">
      </form>
      <a class="main-header__add-lot button" href="../pages/add-lot.php">Добавить лот</a>
      <div class="user-menu_image"> <img src=" ' . $value_lgn['image'] . ' " width="80" height="80" alt="Пользователь">
        <p>' . $value_lgn['name'] . '</p>
    <a class="text-link" href="../pages/session_close.php">Завершить
    сеанс</a>
      </div>
</header>';
    } else {
        echo '
  <!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>' . $title .
            '</title>
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
      <form class="main-header__search" method="get" action="../pages/search.php" enctype="multipart/form-data">
        <input type="search" name="search" placeholder="Поиск лота">
        <input class="main-header__search-btn" type="submit" name="find" value="Найти">
      </form>
      <nav class="user-menu">
      <ul class="user-menu__list">
      <li class="user-menu_item">
          <a class="text-link" href="../pages/login.php">Вход</a>
        </li>
      <li class="user-menu_item">
          <a class="text-link" href="../pages/sign-up.php">Регистрация</a>
        </li>
      </ul>
    </nav>
      </div>
</header>';
    }
};