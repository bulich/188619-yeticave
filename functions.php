<?php

  define('TEMPLATE_DIR_PATH', 'templates/');
  define('TEMPLATE_EXT', '.php');

  function renderTemplate ($path, $data) {
    if(file_exists(TEMPLATE_DIR_PATH . $path . TEMPLATE_EXT)) {
      extract($data, EXTR_PREFIX_SAME, "wddx");
      ob_start();
      require_once(TEMPLATE_DIR_PATH . $path . TEMPLATE_EXT);
      $result = ob_get_clean();
      return $result;
    }
    return "";
  }

?>