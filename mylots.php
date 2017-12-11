<?php
require_once('functions.php');
require_once("userdata.php");
require_once("data.php");
require_once("mysql_helper.php");
require_once("init.php");

$bets = [];
$bet_info = [];
if (isset($_COOKIE["mybet"])) {
  $get_mybets = json_decode(json_encode($_COOKIE["mybet"]));
  foreach($get_mybets as $key => $value) {
    $bets[] = item_by_id($con, $key);
    $bet_info[] = (array)json_decode($value);
  }

  $page_content = render_template("mylots", [
                                              'bets' => $bets,
                                              'bet_info' => $bet_info
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