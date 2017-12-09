<?php
  session_start();

  define('TEMPLATE_DIR_PATH', 'templates/');
  define('TEMPLATE_EXT', '.php');
  define('ONEDAY', 86400);    //Временная метка для одних суток(86400 секунд)
  define('ONEHOUR', 3600);    //Временная метка для одного часа(3600 секунд)
  date_default_timezone_set('Europe/Moscow');
  

  $con = mysqli_connect('localhost', 'root', '', 'yeticave');
  mysqli_set_charset($con, "utf8");

  if ($con == false) {
    $page_content = render_template("error", ['error_message' => "Ошибка подключения: " . mysqli_connect_error()]);
    $layout_content = render_template("layout", ['content' => $page_content, 'title' => "Ошибка"]);
    print($layout_content);
    exit;
  }

