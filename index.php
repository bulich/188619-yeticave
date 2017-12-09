<?php
require_once('userdata.php');
require_once("functions.php");
require_once("data.php");
require_once("init.php");


$page_content = render_template("index", [
                                          'categories' => get_categories($con),
                                          'items' => get_items($con)
                                        ]);
$layout_content = render_template("layout", ['content' => $page_content, 'title' => "Yeticave",'categories' => get_categories($con)]);

print($layout_content);
