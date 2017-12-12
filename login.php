<?php
require_once('functions.php');
require_once("init.php");

$errors = [];

if (($_SERVER['REQUEST_METHOD'] == 'POST') && empty($errors)) {
	$email_received = $_POST['email'];
	$password_received = $_POST['password'];

	if ($user = search_by_email($con, $email_received)) {
			$password_hash = $user['pass'];

			if (password_verify($password_received, $password_hash)) {
					$_SESSION['user'] = $user;
					header("Location: /index.php");
			}
			else {
					$errors['password'] = 'Вы ввели неверный пароль';
					$content = render_template('login', ['form' => $_POST, 'errors' => $errors]);
					$layout_template = render_template('layout', ['title' => 'GifTube - Вход на сайт', 'categories' => get_categories($con), 'content' => $content]);
					print ($layout_template);
					exit();
			}
	}
	else {
			$errors['email'] = 'Пользователя с таким email не существует';
			$content = render_template('login', ['categories' => get_categories($con), 'form' => $_POST, 'errors' => $errors]);
			$layout_template = render_template('layout', ['title' => 'GifTube - Вход на сайт', 'categories' => get_categories($con), 'content' => $content]);
			print ($layout_template);
			exit();
	}
}

$page_content = render_template('login', ['errors' =>'']);

$layout_content = render_template('layout', [
	'content'    => $page_content,
	'categories' => get_categories($con),
  'title'      => 'GifTube - Вход на сайт',
]);

print($layout_content);