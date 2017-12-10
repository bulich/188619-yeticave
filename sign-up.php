<?php
require_once('userdata.php');
require_once("functions.php");
require_once("data.php");
require_once("init.php");

$user = null;


	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$user = $_POST;
		$required = ['email', 'password', 'name', 'message'];
		$dict = [
						'email' => 'email',
						'password' => 'password',
						'name' => 'name',
						'message' => 'message'
					];
		$errors = [];
		foreach ($_POST as $key => $value) {
			if (in_array($key, $required)) {
				if (!$value) {
					$errors[$dict[$key]] = 'Это поле надо заполнить';
				}
			}
    }
    
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      if (search_by_email($con, $user['email'])) {
        $errors[$dict['email']] = 'Пользователь с таким email уже существует';
      }
    }
    else {
			$errors[$dict['email']] = 'Введите корректный email';
		}
		


		if (isset($_FILES['image'])) {
			$tmp_name = $_FILES['image']['tmp_name'];
			$path = $_FILES['image']['name'];

			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$file_type = finfo_file($finfo, $tmp_name);
			if ($file_type !== "image/jpeg" && $file_type !== "image/png") {
				$errors['Файл'] = 'Загрузите изображение в формате jpg или png';
			}
			else {
				move_uploaded_file($tmp_name, 'img/' . $path);
				$user['image-path'] = $path;
			}
		}
		else {
			$user['image-path'] = "";
		}


			
		if (count($errors)) {
			$page_content = render_template('sign-up', ['user' => $user, 'errors' => $errors]);
		}
		else {
			add_user($con, $user['email'], $user['name'], password_hash($user['password'], PASSWORD_DEFAULT), $user['image-path'], $user['message']);
			$page_content = render_template('login', ['errors' => '']);
		}
	}
	else {
		$page_content = render_template('sign-up', ['errors' => '', 'user' => $user]);
	}

	$layout_content = render_template('layout', [
		'content'    => $page_content,
		'categories' => get_categories($con),
		'title'      => 'Yeticave - Регистрация'
	]);

	print($layout_content);
