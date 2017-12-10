<?php
   require_once("mysql_helper.php");
   require_once("init.php");

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
      $time = strtotime($time);
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

  function search_by_email($con, $email) {
    $result = null;
    $sql = 'SELECT id, pass, email, username, avatar FROM users '
    . "WHERE email = '$email'";

    $result = mysqli_query($con, $sql);
  
    if ($result) {
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    return false;
   }


   function time_remaining($end_time) {
    return gmdate("j дней", strtotime($end_time) - strtotime('now'));
   }

    function get_categories($con) {
        $sql = 'SELECT `category_id`, `category_title` FROM categories';
        $result = mysqli_query($con, $sql);
      
        if ($result) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return  mysqli_error($con);
    }

    function get_items($con) {
        $sql = 'SELECT lot_id, image_path, name, lots.category_id, rate, step, description, end_date, categories.category_title FROM lots '
        . 'INNER JOIN categories ON lots.category_id = categories.category_id';

        $result = mysqli_query($con, $sql);
      
        if ($result) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return  mysqli_error($con);
    }

    function get_bets($con, $item_id) {
        $sql = 'SELECT author_id, lot_id, price, bets.create_date, users.username FROM bets '
        . 'INNER JOIN users ON bets.author_id = users.id '
        . "WHERE lot_id = $item_id";

        $result = mysqli_query($con, $sql);
      
        if ($result) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return  mysqli_error($con);
    }

    function add_bet($con, $price, $author_id, $lot_id){
        $sql = 'INSERT INTO bets (create_date, price, author_id, lot_id) VALUES (NOW(), ?)';
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $price);
        $res = mysqli_stmt_execute($stmt);
        if (!res) {
            return mysqli_error($link);
        }
    }

    function add_user($con, $email, $username, $pass, $avatar, $contacts){
        $sql = 'INSERT INTO users (reg_date, email, username, pass, avatar, contacts) ' 
        . 'VALUES (NOW(), ?, ?, ?, ?, ?)';
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'sssss', $email, $username, $pass, $avatar, $contacts);
        $res = mysqli_stmt_execute($stmt);
        if (!$res) {
            return mysqli_error($con);
        }
    }

    function get_id($con) {
        $sql = 'SELECT id FROM users '
        . "WHERE id = ";
        
    }

    function get_password($con, $email) {
        $sql = 'SELECT password FROM users '
        . "WHERE email = '$email'";
    
        $result = mysqli_query($con, $sql);
      
        if ($result) {
            $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return array_shift($arr);
        }
        return  mysqli_error($con);
       }


?>