<?php
require_once("init.php");
require_once('functions.php');
require_once("userdata.php");
require_once("data.php");

$get_mybets = json_decode(json_encode($_COOKIE["mybet"]));

$page_content = render_template("mylots", [
                                            'categories' => $categories,
                                            'items' => $items,
                                            'bets' => $get_mybets
                                          ]);
$layout_content = render_template("layout", [
                                              'content' => $page_content,
                                              'title' => 'Мои ставки'
                                            ]);

print($layout_content);