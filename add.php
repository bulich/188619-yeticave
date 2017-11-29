<?php

$title = "Add new lot";

require_once("functions.php");
require_once("data.php");

session_start();

$lot = null;

if (isset($_SESSION['user'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		


		$lot = $_POST;
		$required = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];
		$dict = ['lot-name' => 'Название лота', 'category' => 'Категория', 'message' => 'Описание', 'lot-rate' => 'Начальная цена', 'lot-step' => 'Шаг ставки', 'lot-date' => 'Дата окончания торгов'];
		$errors = [];
		foreach ($_POST as $key => $value) {
			if (in_array($key, $required)) {
				if (!$value) {
					$errors[$dict[$key]] = 'Это поле надо заполнить';
				}
			}
			
		}
		
		if ((!is_int($lot['lot-rate']) && ($lot['lot-rate'] <= 0))) { 
				$errors['Значение начанльной цены'] = 'Укажите корректное значение начальной цены в рублях'; 
		}

		if ((!is_int($lot['lot-step']) && ($lot['lot-step'] <= 0))) { 
			$errors['Значение шага'] = 'Укажите корректное значение  шага ставки в рублях'; 
		}

		if ((strtotime($lot['lot-date']) -  strtotime('now')) < ONEDAY) { 
			$errors['Дата'] = 'Указанная дата должна быть больше текущей даты хотя бы на один день'; 
		}

		if (!empty($_FILES['userfile']['name'])) {
			$tmp_name = $_FILES['userfile']['tmp_name'];
			$path = $_FILES['userfile']['name'];

			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$file_type = finfo_file($finfo, $tmp_name);
			if ($file_type !== "image/jpeg" && $file_type !== "image/png") {
				$errors['Файл'] = 'Загрузите изображение лота в формате jpg или png';
			}
			else {
				move_uploaded_file($tmp_name, 'img/' . $path);
				$lot['path'] = $path;
			}
		}
		else {
			$errors['Файл'] = 'Вы не загрузили изображение';
		}

			
		if (count($errors)) {
			$page_content = renderTemplate('add', ['lot' => $lot, 'errors' => $errors]);
		}
		else {
			$page_content = renderTemplate('lot', ['lot' => $lot, 'bets' => $bets]);
		}
	}
	else {
		$page_content = renderTemplate('add', ['errors' => '', 'lot' => $lot]);
	}

	$layout_content = renderTemplate('layout', [
		'content'    => $page_content,
		'categories' => [],
		'title'      => 'Yeticave - Добавление добавление лота'
	]);

	print($layout_content);
}

else {
	http_response_code(403);
  print("Пожалуйста, авторизуйтесь");
}
