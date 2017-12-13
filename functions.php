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
        . "WHERE lot_id = ?";

        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $item_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
      
        if ($result) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return  mysqli_error($con);
    }

    function item_by_id($con, $lot_id) {
        $sql = 'SELECT lot_id, image_path, category_title, name, end_date FROM lots '
        . 'INNER JOIN categories ON lots.category_id = categories.category_id '
        . "WHERE lot_id = ?";

        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $lot_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
      
        if ($result) {
            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return  mysqli_error($con);
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

    function add_lot($con, $name, $description, $image_path, $rate, $end_date, $step, $author_id, $category_id){
        $sql = 'INSERT INTO lots (lots.create_date, name, description, image_path, rate, end_date, step, lots.author_id, lots.category_id) ' 
        . 'VALUES (NOW(), ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'sssisiii', $name, $description, $image_path, $rate, $end_date, $step, $author_id, $category_id);
        $res = mysqli_stmt_execute($stmt);
        if (!$res) {
            return mysqli_error($con);
        }
    }


    function add_bet($con, $price, $author_id, $lot_id){
        $sql = 'INSERT INTO bets (create_date, price, author_id, lot_id) ' 
        . "VALUES (NOW(), ?, $author_id, $lot_id)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $price);
        $res = mysqli_stmt_execute($stmt);
        if (!$res) {
            return mysqli_error($con);
        }
    }

    function get_id() {
      if (isset($_SESSION['user'])) {
          return $_SESSION['user']['id'];
      }
    }


    function get_items_count($con) {
        $result = mysqli_query($con, "SELECT COUNT(*) as cnt FROM lots");
        return mysqli_fetch_assoc($result)['cnt'];
    }

    function get_page_item($con, $page_items, $offset) {
        $sql = 'SELECT lot_id, image_path, name, lots.category_id, rate, step, description, end_date, categories.category_title FROM lots '
        . 'INNER JOIN categories ON lots.category_id = categories.category_id '
        . 'ORDER BY end_date DESC LIMIT ? OFFSET ?';
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'ii', $page_items, $offset);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
      
        if ($result) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return  mysqli_error($con);
    }

?>