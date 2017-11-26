<?php

  define('TEMPLATE_DIR_PATH', 'templates/');
  define('TEMPLATE_EXT', '.php');
  define('ONEDAY', 86400);    //Временная метка для одних суток(86400 секунд)
  define('ONEHOUR', 3600);    //Временная метка для одного часа(3600 секунд)
  
  date_default_timezone_set('Europe/Moscow');

  function renderTemplate ($path, $data) {
    if(file_exists(TEMPLATE_DIR_PATH . $path . TEMPLATE_EXT)) {
      extract($data, EXTR_PREFIX_SAME, "wddx");
      ob_start();
      require_once(TEMPLATE_DIR_PATH . $path . TEMPLATE_EXT);
      return ob_get_clean();
    }
    return "";
  }
  
  function format_time($time) {
      $time_diff = strtotime('now') - $time;
      if ($time_diff > ONEDAY) {
          return gmdate("d.m.y", $time) . " в " . gmdate("H:i");
      }
      elseif ($time_diff >= ONEHOUR) {
          return gmdate('G', $time) . " часов назад";
      }
      elseif ($time_diff < ONEHOUR) {
          return ltrim(gmdate('i', $time), 0) . " минут назад";
      }
  }

  function validateInt($value) { 
    return filter_var($value, FILTER_VALIDATE_INT); 
  }

?>