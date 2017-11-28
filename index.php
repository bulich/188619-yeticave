<?php
session_start();

require_once('userdata.php');
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

$title = "Yeticave";

require_once("functions.php");
require_once("data.php");

$page_content = renderTemplate("index", ['categories' => $categories, 'items' => $items, 'lot_time_remaining' => $lot_time_remaining]);
$layout_content = renderTemplate("layout", ['content' => $page_content, 'title' => $title]);

print($layout_content);
