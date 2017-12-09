<?php
require_once('functions.php');
require_once('data.php');
require_once('userdata.php');
require_once("mysql_helper.php");
require_once("init.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$form = $_POST;

	$required = ['email', 'password'];
	$dict = ['email' => 'Email', 'password' => 'Пароль'];
	$errors = [];
	foreach ($_POST as $key => $value) {
		if (in_array($key, $required)) {
			if (!$value) {
				$errors[$dict[$key]] = 'Это поле надо заполнить';
			}
		}
	}

	if ($user = searchUserByEmail($form['email'], $users)) {
		if (password_verify($form['password'], $user['password'])) {
			$_SESSION['user'] = $user;
		}
			$errors[$dict['password']] = 'Неверный пароль';
	}
	$errors[$dict['email']] = 'Такой пользователь не найден';


	if (count($errors)) {
		$page_content = render_template('login', ['form' => $form, 'errors' => $errors]);
	}
	header("Location: /index.php");
	exit();
	
}
$page_content = render_template('login', ['errors' =>'']);

$layout_content = render_template('layout', [
	'content'    => $page_content,
	'categories' => get_categories($con),
  'title'      => 'GifTube - Вход на сайт',
]);

print($layout_content);