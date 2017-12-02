<?php

require_once("functions.php");
require_once("data.php");


$lot = null;

if (isset($_GET['id'])) {
  foreach ($items as $key => $value) {
  if ($key == $_GET['id']) {
    $lot = $value;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $bet = $_POST;
      if ($bet['cost'] > $lot['lot-rate']) {
        $mybet['cost'] = $_POST['cost'];
        $mybet['time'] = $now;
        $expire = strtotime("+30 days");
        $path = "/";
        setcookie("mybet[$key]", json_encode($mybet),  $expire, $path);
        header("Location: /mylots.php");
      }   
    }

    $page_content = renderTemplate("lot", ['categories' => $categories, 'lot' => $lot, 'lot_time_remaining' => $lot_time_remaining, 'bets' => $bets, 'id' => $key]);
    $layout_content = renderTemplate("layout", ['content' => $page_content, 'title' => "Просмотр лота"]);
    print($layout_content);

  }
  }
}

if (! $lot) {
  http_response_code(404);
  print("Страница не найдена");
}

