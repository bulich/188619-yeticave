<?php
require_once("functions.php");
require_once("mysql_helper.php");
require_once("init.php");

$lot = null;
$error = null;

if (isset($_GET['id'])) {
  foreach (get_items($con) as $value) {
  if ($value['lot_id'] == $_GET['id']) {
    $lot = $value;
    $lot_id = $value['lot_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($_POST['cost'] > ($lot['rate'] + $lot['step']) && is_numeric($_POST['cost'])) {
        $mybet['cost'] = $_POST['cost'];
        $mybet['time'] = strtotime('now');
        $mybet['lot_id'] = $lot_id;
        $expire = strtotime("+30 days");
        $path = "/";
        setcookie("mybet[$lot_id]", json_encode($mybet), $expire, $path);
        add_bet($con, $mybet['cost'], get_id(), $lot_id);
        $error = null;
        header("Location: /mylots.php");
      }
      else $error = "Ваша ставка должна быть больше минимальной ставки (в рублях)";
    }

    $page_content = render_template("lot", [
                                            'lot' => $lot,
                                            'bets' => get_bets($con, $value['lot_id']),
                                            'id' => $value['lot_id'],
                                            'error' => $error
                                          ]);
    $layout_content = render_template("layout", [
                                                'content' => $page_content,
                                                'title' => "Просмотр лота",
                                                'categories' => get_categories($con)
                                                ]);
    print($layout_content);
  }
  }
}

if (! $lot) {
  http_response_code(404);
  $page_content = render_template("error", ['error_message' => "К сожалению, лот не найден"]);
  $layout_content = render_template("layout", [
    'content' => $page_content,
    'title' => "Ошибка",
    'categories' => get_categories($con)
    ]);
  print($layout_content);
}

