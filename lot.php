<?php
require_once("functions.php");
require_once("data.php");
require_once("mysql_helper.php");
require_once("init.php");

$lot = null;
$error = null;

if (isset($_GET['id'])) {
  foreach ($items as $key => $value) {
  if ($key == $_GET['id']) {
    $lot = $value;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($_POST['cost'] > $lot['lot-rate'] && is_numeric($_POST['cost'])) {
        $mybet['cost'] = $_POST['cost'];
        $mybet['time'] = $now;
        $expire = strtotime("+30 days");
        $path = "/";
        setcookie("mybet[$key]", json_encode($mybet), $expire, $path);
        $error = null;
        header("Location: /mylots.php");
      }
      else $error = "Ваша ставка должна быть больше минимальной ставки (в рублях)";
    }

    $page_content = render_template("lot", [
                                            'categories' => $categories,
                                            'lot' => $lot,
                                            'lot_time_remaining' => $lot_time_remaining, 
                                            'bets' => $bets,
                                            'id' => $key,
                                            'error' => $error
                                          ]);
    $layout_content = render_template("layout", [
                                                'content' => $page_content,
                                                'title' => "Просмотр лота"
                                                ]);
    print($layout_content);
  }
  }
}

if (! $lot) {
  http_response_code(404);
  $layout_content = render_template("layout", [
    'content' => "<h1>К сожалению, страница не найдена :(</h1>",
    'title' => "Страница не найдена"
    ]);
  print($layout_content);
}

