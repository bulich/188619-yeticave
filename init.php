<?php
  session_start();

  define('TEMPLATE_DIR_PATH', 'templates/');
  define('TEMPLATE_EXT', '.php');
  define('ONEDAY', 86400);    //Временная метка для одних суток(86400 секунд)
  define('ONEHOUR', 3600);    //Временная метка для одного часа(3600 секунд)
  date_default_timezone_set('Europe/Moscow');
  
  $lot_time_remaining = "00:00";
  $tomorrow = strtotime('tomorrow midnight');
  $now = strtotime('now');
  $lot_time_remaining = gmdate("H:i", $tomorrow - $now);