<?php
$con = mysqli_connect("localhost", "root", "root", "todolist");

include 'mysql_helper.php';

function counter_task($array, $string) {
	$countTask = 0;

	if ($string == 'Все') {
		$countTask = count($array);
	} else {
		foreach ($array as $key => $val) {
			if ($val['project_id'] == $string) {
				$countTask = $countTask + 1;
			}
		}
	}

	return $countTask;
}

/**
 * @param  string $filename
 * @param  array  $data
 * @return string
 */
function includeTemplate($filename, $data) {
	if ('templates/'.str_replace('..','',$filename).'.php') {
		htmlspecialchars($data);
		ob_start();
		include 'templates/'.$filename.'.php';
		$text = ob_get_contents();
		ob_end_clean();
		return $text;
		
	} else {
		return '';
	}
}

/**
 * Функция добавления зарегистрированого пользователя
 */
function add_data($result, $sql, $data) {
	$new = db_get_prepare_stmt($result, $sql, $data);
	$add = mysqli_stmt_execute($new);
	if ($add == false) {
		return false;
	} else {
		return true;
		
	}
}

if ($con == false){
	print("Ошибка подключения: " . mysqli_connect_error());
} else {
		// Вывод списка категорий
	$sql = "SELECT id, name FROM projects";
	$result = mysqli_query($con, $sql);

	if ($result) {
		$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
			// print_r($categories);
	} else {
		$error = mysqli_error($con);
	}

		// Вывод списка заданий
	$sql = "SELECT id, title, deadline, project_id, dt_ready, ready FROM tasks";
	$result = mysqli_query($con, $sql);

	if ($result) {
		$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
			// print_r($tasks);
	} else {
		$error = mysqli_error($con);
	}
}

if (!empty($_POST)) {
	$name = $_POST["name"];
	$project = $_POST["project"];
	$date = $_POST["date"];

	$last_data = [
	'name' => $name, 
	'project' => $project,
	'date' => $date
	];

	if (isset($name)) {
		if (strlen($name) == 0) {
			$errors["name"] = "Заполните поле - Название";
		}
	}

	if (isset($project)) {
		if (strlen($project) == 0) {
			$errors["project"] = "Заполните поле - Проект";
		}
	}

	if (isset($date)) {
		if (strlen($date) == 0) {
			$errors["date"] = "Заполните поле - Дата выполнения";
		}
	}
	if (isset($_FILES['preview'])) {
			$file = $_FILES['preview'];
			$uploaddir = __DIR__.DIRECTORY_SEPARATOR.uploads.DIRECTORY_SEPARATOR;
			$uploadfile = $uploaddir . basename($file['name']);
			move_uploaded_file($file["tmp_name"], $uploadfile);
	}
	if ($errors == []) {
		unset($_GET['add']);
		$last_data = [];
		if ($con == false){
		  print("Ошибка подключения: " . mysqli_connect_error());
		} else {
      $sql = "INSERT INTO tasks (dt_add, title, deadline, project_id) VALUES (NOW(), ?, ?, ?)";
      add_data($con, $sql, [$name, $date, $project]);
      if (!$add_user) {
        header("Location: /index.php");
      }

		}
		

	}
}

function searchUserByEmailLog($email, $users) {
	$result = null;
	foreach ($users as $user) {
		if ($user['email'] == $email) {
			$result = $user;
			break;
		}
	}
	return $result; 
}

function searchUserByEmail($email, $emails) {
	$result = null;
	foreach ($emails as $eml) {
		if ($eml['email'] == $email) {
			$result = 'Такой email уже зарегистрирован';
			break;
		}
	}
	return $result; 
}

if (isset($_GET['logout'])) {
	unset($_SESSION['user']);
}

$header = includeTemplate('header', []);
$main = includeTemplate('main', ['categories' => $categories, 'tasks' => $tasks, 'show_comleted_status' => $show_comleted_status]);
$footer = includeTemplate('footer', []);
$form = includeTemplate('form', ['errors' => $errors, 'last_data' => $last_data]);
