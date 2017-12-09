<?php
require_once('userdata.php');
require_once("functions.php");
require_once("data.php");
require_once("mysql_helper.php");
require_once("init.php");

$page_content = render_template("index", [
                                          'categories' => $categories,
                                          'items' => $items,
                                          'lot_time_remaining' => $lot_time_remaining
                                        ]);
$layout_content = render_template("layout", ['content' => $page_content, 'title' => "Yeticave"]);

print($layout_content);
