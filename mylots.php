<?php
require_once('functions.php');
require_once("userdata.php");
require_once("data.php");
require_once("mysql_helper.php");
require_once("init.php");

if (isset($_COOKIE["mybet"])) {
  $get_mybets = json_decode(json_encode($_COOKIE["mybet"]));

  $page_content = render_template("mylots", [
                                              'categories' => get_categories($con),
                                              'items' => $items,
                                              'bets' => $get_mybets
                                            ]);
}
else $page_content = render_template("error", [
  'categories' => get_categories($con),
  'error_message' => "Вы пока не делали ставок",
  'title' => 'Мои ставки'
]);

$layout_content = render_template("layout", [
  'categories' => get_categories($con),
  'content' => $page_content,
  'title' => 'Мои ставки'
  ]);

print($layout_content);