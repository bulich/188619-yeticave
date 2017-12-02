<?php

  define('TEMPLATE_DIR_PATH', 'templates/');
  define('TEMPLATE_EXT', '.php');
  define('ONEDAY', 86400);    //Временная метка для одних суток(86400 секунд)
  define('ONEHOUR', 3600);    //Временная метка для одного часа(3600 секунд)

    session_start();
  
    // устанавливаем часовой пояс в Московское время
    date_default_timezone_set('Europe/Moscow');

    // записать в эту переменную оставшееся время в этом формате (ЧЧ:ММ)
    $lot_time_remaining = "00:00";

    // временная метка для полночи следующего дня
    $tomorrow = strtotime('tomorrow midnight');

    // временная метка для настоящего времени
    $now = strtotime('now');

    // далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining
    $lot_time_remaining = gmdate("H:i", $tomorrow - $now);


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

  function searchUserByEmail($email, $users) {
	$result = null;
	foreach ($users as $user) {
		if ($user['email'] == $email) {
			$result = $user;
			break;
		}
	}
    return $result;
}

?>