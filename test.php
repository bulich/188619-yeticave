<?php
require_once('functions.php');
require_once('data.php');
require_once('userdata.php');
require_once("mysql_helper.php");
require_once("init.php");





$bets = [];
$bet_info = [];
$get_mybets = json_decode(json_encode($_COOKIE["mybet"]));
foreach($get_mybets as $key => $value) {
  $bets[] = item_by_id($con, $key);
  $bet[] = (array)json_decode($value);
}


print_r($bet);