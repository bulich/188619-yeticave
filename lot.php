<?php

require_once("functions.php");
require_once("data.php");


if (isset($_GET['id'])) {
  foreach ($items as $key => $value) {
  if ($key == $_GET['id']) {
    $lot = $value;
    break;
  }
  }
}

if (! $lot) {
http_response_code(404);
}

$page_content = renderTemplate("lot", ['categories' => $categories, 'lot' => $lot, 'lot_time_remaining' => $lot_time_remaining, 'bets' => $bets]);
$layout_content = renderTemplate("layout", ['content' => $page_content, 'title' => $title, 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar]);

print($layout_content);
