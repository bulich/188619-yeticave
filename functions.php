<?php

  function render_template ($path, $data) {
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