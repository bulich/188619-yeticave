<?php
session_start();

require_once('userdata.php');

$title = "Yeticave";

require_once("functions.php");
require_once("data.php");

$page_content = renderTemplate("index", ['categories' => $categories, 'items' => $items, 'lot_time_remaining' => $lot_time_remaining]);
$layout_content = renderTemplate("layout", ['content' => $page_content, 'title' => $title]);

print($layout_content);
