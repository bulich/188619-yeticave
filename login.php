<?php
require_once('functions.php');
require_once('data.php');
require_once('userdata.php');


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
		else {
			$errors[$dict['password']] = 'Неверный пароль';
		}
	}
	else {
		$errors[$dict['email']] = 'Такой пользователь не найден';
	}

	if (count($errors)) {
		$page_content = renderTemplate('login', ['form' => $form, 'errors' => $errors]);
	}
	else {
		header("Location: /index.php");
		exit();
	}
}
else {
	$page_content = renderTemplate('login', ['errors' =>'']);
}

$layout_content = renderTemplate('layout', [
	'content'    => $page_content,
	'categories' => [],
  'title'      => 'GifTube - Вход на сайт',
]);

print($layout_content);