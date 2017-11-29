<?php

require_once("functions.php");
require_once("data.php");

session_start();

$lot = null;

if (isset($_GET['id'])) {
  foreach ($items as $key => $value) {
  if ($key == $_GET['id']) {
    $lot = $value;
    $page_content = renderTemplate("lot", ['categories' => $categories, 'lot' => $lot, 'lot_time_remaining' => $lot_time_remaining, 'bets' => $bets]);
    $layout_content = renderTemplate("layout", ['content' => $page_content, 'title' => "Просмотр лота"]);
    print($layout_content);
  }
  }
}

if (! $lot) {
  http_response_code(404);
  print("Страница не найдена");
}

