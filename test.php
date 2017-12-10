<?php
require_once('functions.php');
require_once('data.php');
require_once('userdata.php');
require_once("mysql_helper.php");
require_once("init.php");


print_r(search_by_email($con, 'kitty_93@li.ru'));